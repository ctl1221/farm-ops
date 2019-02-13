<template>
    <table class="table is-bordered is-fullwidth">
        <thead>
            <th style="width:160px" class="has-text-centered">Material Code</th>
            <th style="width:400px" class="has-text-centered">Description</th>
            <th style="width:50px" >Unit</th>
            <th style="width:80px" class="has-text-centered">Quantity</th>
            <th class="has-text-centered">Net Weight</th>
            <th class="has-text-centered">Unit Price</th>
            <th class="has-text-centered">Amount</th>
            <th class="has-text-centered">Tax</th>
            <th class="has-text-centered">Transaction Type</th>
            <th class="has-text-centered"></th>
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
                :selWeight="line.kg_weight"
                :selPrice="line.price"
                :selVatable="line.vatable"

                @changeMaterial="changeMaterial(index, $event)"
                @changeQuantity="changeQuantity(index, $event)"

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
                'total':0,
                'lines' : []
            }
        },

        methods: {
            calculateAggregates: function()
            {
                var i = 0;
                var current_total = 0;

                for(i = 0; i < this.lines.length; i++)
                {
                    current_total += this.lines[i].price * this.lines[i].quantity;
                }

                this.total = current_total;
            },

            addItem: function(){
                this.lines.push(
                {
                    'id': this.materials[0].id,
                    'material_type': this.materials[0].material_type,
                    'description': this.materials[0].description,
                    'uom': this.materials[0].uom,
                    'kg_weight': this.materials[0].kg_weight,
                    'price': this.materials[0].price,
                    'vatable':this.materials[0].vatable,
                    'quantity': 1,
                });

                this.calculateAggregates();
            },

            changeMaterial: function(i, value){
                this.lines[i].id = value.id;
                this.lines[i].material_type = value.material_type;
                this.lines[i].description = value.description;
                this.lines[i].uom = value.uom;
                this.lines[i].kg_weight = value.kg_weight;
                this.lines[i].price = value.price;
                this.lines[i].vatable = value.vatable;

                this.calculateAggregates();
            },

            changeQuantity: function(i, value){

                this.lines[i].quantity = value.quantity;
                this.calculateAggregates();
            },

            deleteItem: function(ind){
                this.lines.splice(ind,1);
                this.$emit('subtract_n_lines');
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
