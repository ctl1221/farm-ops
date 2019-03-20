<template>
    <div>
        <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
            <thead>

                <tr>
                    <th colspan="2" class="has-text-right">Farm</th>
                    <th class="has-background-info">{{ totalBirds() | numberFormat }}</th>
                    <th colspan="2"></th>
                    <th class="has-background-info">{{ totalWeight() | currencyFormat }}</th>
                    <th class="has-background-info">{{ totalFIC() | currencyFormat }}</th>
                    <th colspan="3"></th>
                    <th class="has-background-info">{{ totalAdjustedWeight() | currencyFormat }}</th>
                    <th class="has-background-info">{{ (totalAdjustedWeight() / totalBirds()) | weightFormat  }}</th>
                    <th class="has-background-info">{{ (totalIncentive() / totalAdjustedWeight()) | currencyFormat }}</th>
                    <th class="has-background-info">{{ totalIncentive() | currencyFormat }}</th>
                </tr>

                <tr>
                    <th colspan="2" class="has-text-right">Dressing Plant</th>
                    <th class="has-background-primary">{{ totalBirds() | numberFormat }}</th>
                    <th colspan="2"></th>
                    <th class="has-background-primary">{{ totalWeight() | currencyFormat }}</th>
                    <th class="has-background-primary">{{ totalFIC() | currencyFormat }}</th>
                    <th colspan="3"></th>
                    <th class="has-background-primary">{{ totalAdjustedWeight() | currencyFormat }}</th>
                    <th class="has-background-primary">{{ (totalAdjustedWeight() / totalBirds()) | weightFormat  }}</th>
                    <th class="has-background-primary">{{ (totalIncentive() / totalAdjustedWeight()) | currencyFormat }}</th>
                    <th class="has-background-primary">{{ totalIncentive() | currencyFormat }}</th>
                </tr>

                <tr class="has-background-light">
                    <th>Date</th>
                    <th>Doc. No.</th>
                    <th>Plant Ct</th>
                    <th>AR Time</th>
                    <th>Weigh Time</th>
                    <th>Plant Wt</th>
                    <th>FIC</th>
                    <th>D/N</th>
                    <th>Adj Time</th>
                    <th>Adj Kg</th>
                    <th>Adj Wt</th>
                    <th>Adj ALW</th>
                    <th>ALW Rate</th>
                    <th>ALW Incentive</th>
                    
                    
                </tr>
            </thead>

            <tbody>
                <tr v-for="(x, x_index) in harvests">

                    <td>{{ x.date }}</td>
                    <td>RS{{ x.control_no }}</td>
                    <td>{{ x.total_harvested | numberFormat }}</td>

                    <template v-if="x.delivery">
                        <td>{{ x.delivery.time_in_plant | timeFormat }}</td>
                        <td>{{ x.delivery.time_weighed_plant | timeFormat }}</td>
                        <td>{{ x.delivery.kg_plant_net_weight | currencyFormat }}</td>
                        <td>{{ x.delivery.kg_plant_feeds_in_crop | currencyFormat }}</td>
                        <td>{{ x.delivery.shift }}</td>
                        <td>{{ minutesDiffInTime(x.delivery.time_in_plant, x.delivery.time_weighed_plant) | minToHourMinute }}</td>
                        <td>{{ (x.delivery.kg_adjusted_net_weight - x.delivery.kg_plant_net_weight) | currencyFormat }}</td>
                        <td>{{ x.delivery.kg_adjusted_net_weight | currencyFormat}}</td>
                        <td>{{ alw(x.delivery.kg_adjusted_net_weight, x.total_harvested) | weightFormat }}</td>
                        <td>{{ x.delivery.alw_rate | currencyFormat }}</td>
                        <td>{{ (x.delivery.alw_rate * x.total_harvested * alw(x.delivery.kg_adjusted_net_weight, x.total_harvested)) | currencyFormat }}</td></td>
                    </template>

                    <template v-else>
                        <td>
                            <input class="input is-small" 
                                    v-model="delivery_forms[x_index].time_in_plant" 
                                    type="time">
                        </td>
                        <td>
                            <input class="input is-small" 
                                    v-model="delivery_forms[x_index].time_weighed_plant" 
                                    type="time">
                        </td>
                        <td>
                            <input class="input is-small" 
                            v-model="delivery_forms[x_index].kg_plant_net_weight" 
                            type="number"></td>
                        <td>
                            <input class="input is-small" 
                                v-model="delivery_forms[x_index].kg_plant_feeds_in_crop" 
                                type="number"></td>
                        <td>
                            <div class="select is-small">
                              <select v-model="delivery_forms[x_index].shift">
                                <option value='D'>D</option>
                                <option value='N'>N</option>
                              </select>
                            </div>
                        </td>
                        <td>{{ minutesDiffInTime(delivery_forms[x_index].time_in_plant, delivery_forms[x_index].time_weighed_plant) | minToHourMinute  }}</td>
                        <td>
                            {{ adjustedWeight(x_index) | currencyFormat }}
                        </td>
                        <td>{{ adjustedNetWeight(x_index) | currencyFormat }}</td>
                        <td>{{ adjustedALW(x_index) | weightFormat }}</td>
                        <td>{{ adjustedALWRate(x_index) | currencyFormat }}</td>
                        <td>{{ adjustedALWIncentive(x_index) | currencyFormat }}</td>
                        <td>
                            <button class="button is-small is-success" 
                                @click="createDelivery(x_index)">
                                Save
                            </button></td>
                    </template>
                </tr>
            </tbody>
        </table>

        
    </div>  

</template>

<script>
    export default {
        props: ['farm','treshold','multiplier','alw_rates'],
        data () {
            return {
                delivery_forms: [],
                farm_id: '',
                harvests: [],
                // dressing_plants: [],
                // date: moment().format('YYYY-MM-DD'),
                // dressing_plant: '',
                // control_no: '',
                // coops_per_truck: '',
                // truck_plate_no: '',
                // total_harvested: '',
            }
        },

        computed : {
            // submittable: function () {
            //     if(!this.date || 
            //         !this.dressing_plant || 
            //         !this.control_no || 
            //         !this.coops_per_truck || 
            //         !this.truck_plate_no || 
            //         !this.total_harvested)
            //     {
            //         return false
            //     }
            //     return true
            // }
        },

        methods: {

            initializeDeliveryForms: function () {
                this.harvests.forEach(function(x, i){
                    this.delivery_forms.push({
                        'harvest_id':this.harvests[i].id,
                        'kg_plant_net_weight': 0.00,
                        'kg_adjusted_net_weight': 0.00,
                        'kg_plant_feeds_in_crop': 0.00,
                        'shift': 'D',
                    });
                }, this);
            },

            getAllharvests: function () {
                axios.get('/api/getHarvestsOfFarm/' + this.farm.id)
                .then(response => {
                    this.harvests = response.data.harvests;
                    this.initializeDeliveryForms();
                });
            },

            minutesDiffInTime: function (from , to) {
                let mod_from = '2018-08-08 ' + from;
                let mod_to = '2018-08-08 ' + to;
                let x = moment(mod_from);
                let y = moment(mod_to);

                if(from == to)
                    return 0;

                if(from && to)
                    return y.diff(x, 'minutes') > 0 ? y.diff(x, 'minutes') : y.diff(x, 'minutes') + 1440 ;

                return false;
            },

            adjustedWeight: function (index) {

                let from = this.delivery_forms[index].time_in_plant;
                let to = this.delivery_forms[index].time_weighed_plant;
                let weight = this.delivery_forms[index].kg_plant_net_weight;
                let shift = this.delivery_forms[index].shift;

                let staging_time = this.minutesDiffInTime(from, to);

                if(staging_time > this.treshold[shift] * 60)
                    return weight * staging_time / 60 * this.multiplier[shift];

                return 0.00;
            },

            adjustedNetWeight: function (index) {

                let weight = this.delivery_forms[index].kg_plant_net_weight;
                let adj_weight = this.adjustedWeight(index);

                if(weight)
                {
                    let net_weight = parseFloat(weight) + parseFloat(adj_weight);
                    
                    this.delivery_forms[index].kg_adjusted_net_weight = net_weight;
                    return net_weight;

                }

                else
                {
                    this.delivery_forms[index].kg_adjusted_net_weight = 0.00;
                    return 0.00;
                }
            },

            adjustedALW: function (index) {

                let bird_count = this.harvests[index].total_harvested;
                let adj_net_weight = this.adjustedNetWeight(index);

                return parseFloat(adj_net_weight) / parseInt(bird_count);
            },

            alw: function (weight , count) {
                return (weight / count).toFixed(3);
            },

            createDelivery: function (index) {
                axios.post('/deliveries', this.delivery_forms[index])
                .then(response => {
                    this.getAllharvests();
                    // this.clearForm();
                    // this.$refs.control.focus();
                });
            },

            adjustedALWRate: function (index) {
                if(this.adjustedALW(index))
                {
                    let rounded_alw =  this.adjustedALW(index).toLocaleString('en-PH',{minimumFractionDigits: 3, maximumFractionDigits: 3});

                    let alw_rate = 0.00;

                    this.alw_rates.forEach(function(x){
                        if(rounded_alw >= x.start && rounded_alw <= x.end)
                        {
                            alw_rate = x.rate;
                        }
                    });

                    this.delivery_forms[index].alw_rate = alw_rate;
                    return alw_rate;

                }

                this.delivery_forms[index].alw_rate = '0.00';
                return '0.00';
            },

            adjustedALWIncentive: function (index) {
                return this.adjustedALWRate(index) * this.adjustedNetWeight(index);
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
                    total += x.delivery ? 
                                x.delivery.kg_plant_net_weight : 
                                parseFloat(this.delivery_forms[i].kg_plant_net_weight);
                }, this);

                return total;
            },

            totalFIC: function () {
                let total = 0;

                this.harvests.forEach(function(x, i) {
                    total += x.delivery ? 
                                x.delivery.kg_plant_feeds_in_crop : 
                                parseFloat(this.delivery_forms[i].kg_plant_feeds_in_crop);
                }, this);

                return total;
            },

            totalAdjustedWeight: function () {
                let total = 0;

                this.harvests.forEach(function(x, i) {
                    total += x.delivery ? 
                                x.delivery.kg_adjusted_net_weight : 
                                parseFloat(this.delivery_forms[i].kg_adjusted_net_weight);
                }, this);

                return total;
            },


            totalIncentive: function () {
                let total = 0;
                this.harvests.forEach(function(x, i) {
                    total += x.delivery ? 
                        x.delivery.alw_rate * x.total_harvested * 
                        this.alw(x.delivery.kg_adjusted_net_weight, x.total_harvested) : 
                        this.adjustedALWIncentive(i);
                }, this);

                return total;
            }
        },

        mounted() {
            this.farm_id = this.farm.id;
            this.getAllharvests();
        }
    }
</script>
