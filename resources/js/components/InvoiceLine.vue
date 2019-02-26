<template>
    <tr>
        <td style="width:160px">
            <div class="select is-small">
                <select v-model="selected_index" style="width:140px">
                    <option v-for="(material, index) in materials" :key="index" :value="index">
                        {{material.code}} - {{ material.description }}
                    </option>
                </select>
            </div>
        </td>
        <td style="width:400px">{{ selDescription }}</td>
        <td style="width:50px">{{ selUom }}</td>
        <td style="width:80px">
            <input class="input is-small has-text-centered" type="number" v-model="quantity" style="width:80px" min=1>
        </td>
        <td class="has-text-centered">{{ net_weight | weightFormat }}</td>
        <td class="has-text-centered">{{ selPrice | currencyFormat }}</td>
        <td class="has-text-centered">{{ amount | currencyFormat }}</td>
        <td class="has-text-centered">{{ vatable_amount | currencyFormat }}</td>
        <td class="has-text-centered">{{ selVatable }}</td>
        <td @click="deleteMe">X</td>
    </tr>
</template>

<script>
    export default {
        props : ['materials','selId','selMaterialType','selDescription','selUom','selWeight','selPrice','selVatable'],
        data () {
            return {
                'selected_index': 0,
                'quantity': 1
            }
        },

        computed: {
            amount: function(){
                return this.selPrice * this.quantity;
            },

            net_weight: function(){
                return this.selWeight * this.quantity;
            },  

            vatable_amount: function(){
                if(this.selVatable == 'VATABLE')
                {
                    return Math.round(this.selPrice * this.quantity * 0.12 * 100) / 100 ;
                }
                else
                {
                    return '0.00';
                }
            },
        },

        methods: {
            deleteMe: function() {
                this.$emit('deleteMe');
            }
        },

        watch: {
            selected_index: function (val, oldVal) {

                this.$emit('changeMaterial',
                {
                    'id': this.materials[val].id,
                    'material_type': this.materials[val].material_type,
                    'description': this.materials[val].description,
                    'uom': this.materials[val].uom,
                    'kg_weight': this.materials[val].kg_weight,
                    'price': this.materials[val].price,
                    'vatable':this.materials[val].vatable,
                });
            },

            quantity: function (val, oldVal) {
                this.$emit('changeQuantity',
                {
                    'quantity': val
                });
            }

        },
    }
</script>
