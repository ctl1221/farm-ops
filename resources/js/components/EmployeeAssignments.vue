<template>
    <div class="card">
        <header class="card-header has-background-info">
            <p class="card-header-title">Employee Assignments</p>
        </header>

        <div class="card-content has-background-light">
            <div class="content">
                <table class="table is-narrow is-fullwidth is-bordered">
                    <thead>
                        <th>Farm</th>
                        <th>Building</th>
                        <th>Supervisor</th>
                        <th>Caretaker</th>
                    </thead>


                    <tbody>
                        <tr v-for="(x, index) in employee_assignments">
                            <td>{{ x.farm_name }}</td>
                            <td>{{ x.building_name }}</td>
                            <td style="width:350px">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="select is-small" v-if="!x.supervisor_name">
                                            <select v-model="selectedSupervisor[index]">
                                                <option v-for="y in supervisor_list" :value="y.id">
                                                    {{ y.display_name }}
                                                </option>
                                            </select>
                                        </div>
                                        {{ x.supervisor_name }}
                                    </div>

                                    <div class="level-right">
                                        <button v-if="!x.supervisor_name" class="button is-outlined is-success is-small" 
                                            @click="assignSupervisor(index, x.building_id, x.farm_id)">
                                                Assign
                                        </button>
                                        <button v-if="x.supervisor_name" class="button is-outlined is-danger is-small" 
                                            @click="unassignSupervisor(x.building_id, x.farm_id)">
                                                Unassign
                                        </button>
                                    </div>
                                </div>
                                
                            </td>
                            <td style="width:350px">
                                <div class="level">
                                    <div class="left">  
                                        {{ x.caretaker_name }}
                                        <div class="select is-small" v-if="! x.caretaker_name" >
                                            <select v-model="selectedCaretaker[index]">
                                                <option v-for="c in caretaker_list" :value="c.id">{{ c.display_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="right"> 
                                        <button v-if="! x.caretaker_name" @click="assignCaretaker(index, x.building_id, x.farm_id)" class="button is-outlined is-small is-success">Assign</button> 
                                        <button v-if="x.caretaker_name" @click="unassignCaretaker(x.building_id, x.farm_id)" class="button is-outlined is-small is-danger">Unassign</button>
                                    </div>  
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['grow','employee_assignments','supervisor_list','caretaker_list'],
        data() {
            return {
                // selectedFarm: '',
                // selectedBuilding: [],
                selectedSupervisor: [],
                selectedCaretaker: [],
                // supervisor_list: {!! $supervisor_list !!},
                // caretaker_list: {!! $caretaker_list !!},
                employee_assignments: [],
                // farms: {!! $farms !!},
                // farm_names: {!! $farm_names !!},
                // untaken_farms: {!! $farms!!},
                // buildings: {!! $buildings !!},
                // taken_buildings_ids: {!! $taken_buildings_ids !!},
                // untaken_building_ids: [],
            }
        },

        methods: {
            // getEmployeeAssignments: function() {
            //     axios.get('/api/getEmployeeAssignmentsOfGrow/' + this.grow.id).then(response => {
            //         this.employee_assignments = response.data;

            //         for (var i = 0; i < response.data.length; i++) { 
            //           this.selectedSupervisor[i] = this.supervisor_list[0].id;
            //           this.selectedCaretaker[i] = this.caretaker_list[0].id;
            //         }
            //     });
            // },

            assignSupervisor: function (index, building_id, farm_id) {
                axios.post('/assign_building_supervisor',{
                    farm_id: farm_id,
                    building_id: building_id,
                    supervisor_id: this.selectedSupervisor[index]
                }).then(response => this.$emit('employee_assignments_changed'));
            },

            unassignSupervisor: function (building_id, farm_id) {
                axios.post('/unassign_building_supervisor',{
                    farm_id: farm_id,
                    building_id: building_id,
                }).then(response => this.$emit('employee_assignments_changed'));
            },

            assignCaretaker: function (index, building_id, farm_id) {
                axios.post('/assign_building_caretaker',{
                    farm_id: farm_id,
                    building_id: building_id,
                    caretaker_id: this.selectedCaretaker[index],
                }).then(response => this.$emit('employee_assignments_changed'));
            },

            unassignCaretaker: function (building_id, farm_id) {
                axios.post('/unassign_building_caretaker',{
                    farm_id: farm_id,
                    building_id: building_id,
                }).then(response => this.$emit('employee_assignments_changed'));
            }
        },
        
        mounted () {
            for (var i = 0; i < this.employee_assignments.length; i++) { 
                this.selectedSupervisor[i] = this.supervisor_list[0].id;
                this.selectedCaretaker[i] = this.caretaker_list[0].id;
            }
        }
    }
</script>
