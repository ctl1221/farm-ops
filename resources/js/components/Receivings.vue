<template>
    <table class="table is-narrow is-fullwidth is-bordered">
        <thead>
            <th class="has-text-centered">Date</th>
            <th class="has-text-centered">Reference</th>
            <th class="has-text-centered">Material</th>
            <th class="has-text-centered">Quantity</th>
            <th class="has-text-centered">Dec. Weight</th>
            <th class="has-text-centered">Act. Weight</th>
            <th class="has-text-centered">Ticket Scale No</th>
            <th class="has-text-centered">Weigh</th>
        </thead>

        <tbody>
            <template v-for="(x, x_index) in receivings">
                <tr v-for="(y, y_index) in x.receiving_lines">
                    <template v-if="y_index == 0">
                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle">
                            <center>{{ x.date }}</center>
                        </td>
                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle">
                            <center>{{ x.doc_no }}</center>
                        </td>
                    </template>

                    <td>
                        <center>{{ material(y.material_type, y.material_id).short_description }}</center>
                    </td>
                    <td><center>{{ y.quantity }}</center></td>

                    <template v-if="y_index == 0">
                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle"
                            :bgcolor="total_declared_weight(x.receiving_lines) != total_actual_weight(x.truck_weighings)? '#FF6347' : 'white'" >
                            <center>
                                {{ total_declared_weight(x.receiving_lines) | numberFormat }}
                            </center>
                        </td>
                    
                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle">
                            <center>
                                {{ total_actual_weight(x.truck_weighings) | numberFormat }}
                            </center>
                        </td>

                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle">
                            <center>
                                <a v-for="z in x.truck_weighings" 
                                class="tooltip is-tooltip is-small" 
                                style="border-color:white; padding-right:0.25rem;" 
                                :data-tooltip="z.kg_net_weight+ ' KG'">
                                    <u>{{ z.ticket_no }}</u>
                                </a>
                            </center>
                        </td>
                        
                        <td :rowspan="x.receiving_lines.length" style="vertical-align:middle">
                            <div class="field has-addons" style="justify-content:center">
                                <p class="control">
                                    <input class="input is-small" 
                                    type="text" 
                                    v-model="weighing_forms[x_index].ticket_no" 
                                    placeholder="Ticket No">
                                </p>
                                <p class="control">
                                    <input class="input is-small"
                                    type="text" 
                                    v-model="weighing_forms[x_index].kg_net_weight" 
                                    placeholder="KG Net Weight">
                                </p>
                                <p class="control">
                                    <button class="button is-small is-success" @click="weigh(x_index)">Weigh</button>
                                </p>
                            </div>
                        </td>
                    </template>

                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ['farm'],
    data() {
        return {
            receivings: [],
            materials:[],
            weighing_forms:[]
        }
    },

    methods: {

        initializeWeighingForms: function () {
            this.receivings.forEach(function(x){
                this.weighing_forms.push({
                    'ticket_no': '',
                    'kg_net_weight': '',
                });
            }, this);
        },

        getAllReceivings: function () {
            axios.get('/api/getReceivingsOfFarm/' + this.farm.id)
            .then(response => {
                this.receivings = response.data.receivings
                this.initializeWeighingForms();
            });
        },

        getAllMaterials: function () {
            axios.get('/api/getAllMaterials')
            .then(response => this.materials = response.data.materials);
        },

        material: function (material_type, material_id) {

            for(let i = 0; i < this.materials.length; i++)
            {
                if(this.materials[i].material_type == material_type.slice(4))
                {
                    if(this.materials[i].id == material_id)
                    {
                        return this.materials[i];
                    }
                }
            }
        },

        total_declared_weight: function(lines)
        {
            let total = 0;
            for(let i = 0; i < lines.length; i++)
            {
                total += lines[i].quantity * this.material(lines[i].material_type, lines[i].material_id).kg_weight;
            }
            return total;
        },

        total_actual_weight: function(lines)
        {
            let total = 0;
            for(let i = 0; i < lines.length; i++)
            {
                total += lines[i].kg_net_weight;
            }
            return total;
        },

        weigh(x_index)
        {
            axios.post('/truckWeighings', {
                ticket_no: this.weighing_forms[x_index].ticket_no,
                kg_net_weight: this.weighing_forms[x_index].kg_net_weight,
                activity_type: 'App\\Receiving',
                activity_id: this.receivings[x_index].id
            }).then(response => {
                this.getAllReceivings();
                this.weighing_forms[x_index].ticket_no = '';
                this.weighing_forms[x_index].kg_net_weight = '';
            });
        }

    },

    mounted() {
        this.getAllReceivings();
        this.getAllMaterials();   
    }
}
</script>


