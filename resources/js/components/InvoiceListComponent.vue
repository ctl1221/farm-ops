<template>
    <table class="table is-bordered is-fullwidth">
        <thead>
            <th>Material Code</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Net Weight</th>
            <th>Unit Price</th>
            <th>Amount</th>
            <th>Tax</th>
            <th>Transaction Type</th>
        </thead>
        <tbody>
            <invoice-line 
                v-for="(line,index) in lines" 
                :key="index" 
                :materials="materials"

                :selId="line.id"
                :selMaterialType="line.material_type"
                :selDescription="line.description"
                :selUom="line.uom"

                @changeMaterial="changeItem(index, $event)"
                @deleteMe="deleteItem(index)">
            </invoice-line>
        </tbody>
    </table>
</template>

<script>
    export default {
        data () {
            return {
                'materials' : [],
                'lines' : []
            }
        },

        methods: {
            addItem: function(){
                this.lines.push(
                {
                    'id': this.materials[0].id,
                    'material_type': this.materials[0].material_type,
                    'description': this.materials[0].description,
                    'uom': this.materials[0].uom,
                });
            },

            changeItem: function(i, value){
                this.lines[i].id = value.id;
                this.lines[i].material_type = value.material_type;
                this.lines[i].description = value.description;
                this.lines[i].uom = value.uom;
            },

            deleteItem: function(ind){
                this.lines.splice(ind,1);
            },
        },

        mounted() {
            axios.get('/api/getAllMaterials').then(response => 
            {
                this.materials = response.data.materials;
            });
        }
    }
</script>
