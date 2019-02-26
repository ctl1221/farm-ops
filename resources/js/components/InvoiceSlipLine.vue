<template>
    <tr>
        <td style="width:160px">
            <div class="select is-small">
                <select v-model="material_index">
                    <option 
                        v-for="(material, index) in materials" 
                        :key="index" 
                        :value="index">
                    {{ material.description }} - {{material.code}}
                    </option>
                </select>
            </div>
        </td>
        <td style="width:400px">{{ item.description }}</td>
        <td style="width:50px">{{ item.uom }}</td>
        <td style="width:80px">
            <input class="input is-small has-text-centered" type="number" v-model="quantity" style="width:80px" min=1>
        </td>
        <td class="has-text-centered">{{ item.kg_weight | weightFormat }}</td>
        <td class="has-text-centered">{{ item.price | currencyFormat }}</td>
        <td class="has-text-centered">{{ total | currencyFormat }}</td>
        <td class="has-text-centered">{{ vat_amount | currencyFormat }}</td>
        <td class="has-text-centered">{{ item.vatable }}</td>
        <td><a @click="$emit('del-is-clicked')">Delete Me</a></td>
    </tr>
</template>

<script>
    export default {
        props: ['materials','item'],
        data () {
            return {
                material_index : 0,
                quantity : this.item.quantity,   
            }
        },

        computed: {
            total: function () {
                return this.quantity * this.item.price
            },

            vat_amount: function () {
                if(this.item.vatable === 'VATABLE')
                {
                    return (this.total / 1.12 * 0.12);
                }
            },

            inputs: function () {
                return `${this.material_index}|${this.quantity}`;
            }
        },

        watch: {
            inputs: function (val, oldVal){
                this.$emit('input-changed', this.$data);
            },
        },
    }

</script>
