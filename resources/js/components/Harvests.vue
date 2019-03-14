<template>
    <div>
        <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-background-light">
                    <th>Date</th>
                    <th>Plant / Live</th>
                    <th>RS No.</th>
                    <th>Coops</th>
                    <th>Plate No.</th>
                    <th>No. Of Heads</th>
                    <th>Total Weight</th>
                    <th>ALW</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="x in harvests">
                    <td>{{ x.date }}</td>
                    <td>{{ x.dressing_plant }}</td>
                    <td>{{ x.control_no }}</td>
                    <td>{{ x.coops_per_truck }}</td>
                    <td>{{ x.truck_plate_no }}</td>
                    <td>{{ x.total_harvested }}</td>
                    <td>---</td>
                    <td>---</td>
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

                    <td></td>
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
        props: ['farm'],
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
            }
        },

        computed : {
            submittable: function () {
                if(!this.date || 
                    !this.dressing_plant || 
                    !this.control_no || 
                    !this.coops_per_truck || 
                    !this.truck_plate_no || 
                    !this.total_harvested)
                {
                    return false
                }
                return true
            }
        },

        methods: {

            getAllharvests: function () {
                axios.get('/api/getHarvestsOfFarm/' + this.farm.id)
                .then(response => this.harvests = response.data.harvests);
            },

            getAllDressingPlants: function () {
                axios.get('/api/getAllDressingPlants')
                .then(response => this.dressing_plants = response.data.dressing_plants);
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
            }
        },

        mounted() {
            this.farm_id = this.farm.id;
            this.getAllharvests();
            this.getAllDressingPlants();
        }
    }
</script>
