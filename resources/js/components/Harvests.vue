<template>
    <div>
        <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th colspan="5" class="has-text-right">Dressing Plant</th>
                    <th class="has-text-centered has-background-primary">{{ totalBirds() | numberFormat }}</th>
                    <th class="has-text-centered has-background-primary">{{ deliveries_aggregates.total_weight | numberFormat }}</th>
                    <th class="has-text-centered has-background-primary">
                        {{ deliveries_aggregates.total_alw | weightFormat }}</th>
                    <th class="has-text-centered has-background-primary">
                        {{ deliveries_aggregates.total_alw_rate | currencyFormat }}</th>
                    <th class="has-text-centered has-background-primary">
                        {{ deliveries_aggregates.total_alw_incentive | currencyFormat }}</th>
                </tr>

                <tr>
                    <th colspan="5" class="has-text-right">Farm</th>
                    <th class="has-text-centered has-background-info">{{ totalBirds() | numberFormat }}</th>
                    <th class="has-text-centered has-background-info">{{ totalWeight() | numberFormat }}</th>
                    <th class="has-text-centered has-background-info">
                        {{ (totalWeight() / totalBirds()) | weightFormat }}</th>
                    <th class="has-text-centered has-background-info">
                        {{ (totalIncentive() / totalWeight()) | currencyFormat }}</th>
                    <th class="has-text-centered has-background-info">
                        {{ totalIncentive() | currencyFormat }}</th>
                </tr>

                <tr class="has-background-light">
                    <th>Date</th>
                    <th>Plant / Live</th>
                    <th>RS No.</th>
                    <th>Coops</th>
                    <th>Plate No.</th>
                    <th>No. Of Heads</th>
                    <th>Total Weight</th>
                    <th>ALW</th>
                    <th>ALW Rate</th>
                    <th>ALW Incentive</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(x, x_index) in harvests">
                    <td>{{ x.date }}</td>
                    <td>{{ x.dressing_plant }}</td>
                    <td>{{ x.control_no }}</td>
                    <td>{{ x.coops_per_truck }}</td>
                    <td>{{ x.truck_plate_no }}</td>
                    <td>{{ x.total_harvested }}</td>
                    <td>
                        <div v-if="x.truck_weighings.length < 1" class="field has-addons" style="justify-content:center">
                            <p class="control">
                                <input class="input is-small" 
                                type="text" 
                                v-model="weighing_forms[x_index].ticket_no" 
                                placeholder="Ticket No">
                            </p>
                            <p class="control">
                                <input class="input is-small"
                                type="number" 
                                v-model="weighing_forms[x_index].kg_net_weight" 
                                placeholder="KG Net Weight">
                            </p>
                            <p class="control">
                                <button class="button is-small is-success" @click="weigh(x_index)">Weigh</button>
                            </p>
                        </div>

                        <span v-else>
                            {{ x.truck_weighings[0].kg_net_weight }}
                        </span>
                    </td>
                    <td>{{ ((x.truck_weighings.length > 0 ? x.truck_weighings[0].kg_net_weight : 0) / x.total_harvested) | weightFormat }}</td>
                    <td>{{ x.alw_rate }}</td>
                    <td>{{ (x.alw_rate * (x.truck_weighings.length > 0 ? x.truck_weighings[0].kg_net_weight : 0)) | currencyFormat }}</td>
                </tr>

                <tr class="has-background-light">
                    <td>
                        <input class="input is-small"
                            type="date" 
                            v-model="date"
                            placeholder="Date">
                    </td>

                    <td>
                        <my-suggest :data="dressing_plants" show-field="name" v-model="dressing_plant"></my-suggest>
                    </td>

                    <td>
                        <input class="input is-small" 
                            ref="control"
                            type="text" 
                            v-model="control_no"
                            placeholder="RS No.">
                    </td>

                    <td>
                        <input class="input is-small" 
                            type="number" 
                            min=1
                            v-model="coops_per_truck"
                            placeholder="No. of Coops">
                    </td>

                    <td>
                        <input class="input is-small" 
                            type="text" 
                            v-model="truck_plate_no"
                            placeholder="Plate No.">
                    </td>

                    <td>
                        <input class="input is-small" 
                            type="number" 
                            min=1
                            v-model="total_harvested"
                            placeholder="No. of Heads">
                    </td>

                    <td>
                        
                        <div class="field has-addons" style="justify-content:center">
                            <p class="control">
                                <input class="input is-small" 
                                type="text"
                                v-model="ticket_no" 
                                placeholder="Ticket No">
                            </p>
                            <p class="control">
                                <input class="input is-small"
                                type="number" 
                                v-model="kg_net_weight"
                                placeholder="KG Net Weight">
                            </p>
                        </div>

                    </td>
                    <td>{{ alw | weightFormat }}</td>
                    <td>{{ calc_alw_rate | currencyFormat }}</td>
                    <td>{{ alw_incentive | currencyFormat }}</td>
                    <td>
                        <button class="button is-small is-success" :disabled="!submittable" 
                            @click="createHarvest">+
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  

</template>

<script>
    export default {
        props: ['farm','alw_rates','deliveries_aggregates'],
        data () {
            return {
                farm_id: '',
                harvests: [],
                dressing_plants: [],
                date: moment().format('YYYY-MM-DD'),
                dressing_plant: '',
                control_no: '',
                coops_per_truck: '',
                truck_plate_no: '',
                total_harvested: '',
                ticket_no: '',
                kg_net_weight:0,
                weighing_forms:[],
                alw_rate: '',
            }
        },

        computed : {
            alw: function () {
                return this.kg_net_weight / this.total_harvested;
            },

            calc_alw_rate: function () {
                let rate = 0.00;

                let rounded_alw =  this.alw.toLocaleString('en-PH',{minimumFractionDigits: 3, maximumFractionDigits: 3});
                
                this.alw_rates.forEach(function(x){
                
                if(rounded_alw >= x.start && rounded_alw <= x.end)
                {
                    rate = x.rate;
                }
                });

                this.alw_rate = rate;

                return rate;
            },

            alw_incentive: function () {
                return this.total_harvested * this.calc_alw_rate;
            },

            submittable: function () {
                if(!this.date || 
                    !this.dressing_plant || 
                    !this.control_no || 
                    !this.coops_per_truck || 
                    !this.truck_plate_no || 
                    !this.total_harvested || 
                    !((this.ticket_no && this.kg_net_weight) || (!this.ticket_no && !this.kg_net_weight)))
                {
                    return false
                }
                return true
            }
        },

        methods: {

            initializeWeighingForms: function () {

                this.weighing_forms = [];

                this.harvests.forEach(function(x){
                    this.weighing_forms.push({
                        'total_harvested': x.total_harvested,
                        'ticket_no': '',
                        'kg_net_weight': '',
                        'harvest_id':x.id,
                    });
                }, this);
            },

            getAllharvests: function () {
                axios.get('/api/getHarvestsOfFarm/' + this.farm.id)
                .then(response => {
                    this.harvests = response.data.harvests;
                    this.initializeWeighingForms();
                });
            },

            getAllDressingPlants: function () {
                axios.get('/api/getAllDressingPlants')
                .then(response => this.dressing_plants = response.data.dressing_plants);
            },

            totalBirds: function () {
                let total = 0;

                this.harvests.forEach(function(x) {
                    total += x.total_harvested;
                });

                return total;
            },

            totalWeight: function () {
                let total = 0;

                this.harvests.forEach(function(x, i) {
                    total += x.truck_weighings.length > 0 ? 
                        x.truck_weighings[0].kg_net_weight : 0;
                }, this);

                return total;
            },

            totalIncentive: function () {
                let total = 0;
                this.harvests.forEach(function(x, i) {
                    if(x.truck_weighings.length > 0)
                    {
                        total += x.alw_rate * parseFloat(x.truck_weighings[0].kg_net_weight);
                    }
                    
                }, this);

                return total;
            },

            createHarvest: function () {
                axios.post('/harvests', this.$data)
                .then(response => {
                    this.getAllharvests();
                    this.getAllDressingPlants();
                    this.clearForm();
                    this.$refs.control.focus();
                });
            },

            clearForm: function () {
                this.control_no = ''; 
                this.coops_per_truck = ''; 
                this.truck_plate_no = ''; 
                this.total_harvested = '';
                this.ticket_no= '';
                this.kg_net_weight=0;
            },

            weigh: function(index) {
                if(this.weighing_forms[index].kg_net_weight && this.weighing_forms[index].ticket_no)
                {
                    axios.post('/harvests/weigh',this.weighing_forms[index])
                    .then(response => {
                        this.getAllharvests();
                    });
                }
                else
                {
                    alert('Incomplete Data');
                }

            },
        },

        mounted() {
            this.farm_id = this.farm.id;
            this.getAllharvests();
            this.getAllDressingPlants();
        }
    }
</script>
