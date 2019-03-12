<template>
    <div>
        <table class="table is-fullwidth is-bordered">
            <tr>
                <th>Supplier</th>
                <th>
                    <select v-model="company_id">
                        <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.name }}</option>
                    </select>
                </th>
                <th style="width:150px">
                    Supplier Invoice No.
                </th>
                <th style="width:300px">
                    <input class="input is-small" style="width:300px" type="text" v-model="supplier_invoice_no">
                </th>
            </tr>
            <tr>
                <th style="width:50px">Date</th>
                <th style="width:300px">
                    <input class="input is-small" style="width:300px" type="date" v-model="date">
                </th>
                <th style="width:150px">
                    SO Reference No.
                </th>
                <th style="width:300px">
                    <input class="input is-small" style="width:300px" type="text" v-model="so_reference_no">
                </th>
            </tr>
            <tr>
                <th>Farm</th>
                <td>{{ farm.name }}</td>
                <th>DR Reference No.</th>
                <th style="width:300px">
                    <input class="input is-small" style="width:300px" type="text" v-model="dr_reference_no">
                </th>
            </tr>
        </table>

        <a class="button is-outlined is-info" @click="addLine">Add Item</a>
        <a href="#" class="button is-outlined is-danger">Cancel</a>

        <input @click="submitForm" class="button is-outlined is-success" type="submit">

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
                <slipline 
                    v-for="(line, index) in lines" 
                    :key="index"

                    :item="line"
                    :materials="materials"

                    @input-changed="updateLine($event, index)"
                    @del-is-clicked="removeLine(index)">
                    >
                    
                </slipline>
                <!-- <invoice-line 
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
                </invoice-line> -->
            </tbody>
        </table>

            <table class="table is-bordered">

                <tr>
                    <th>Total Non-Vat</th>
                    <td>₱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="is-pulled-right">
                            test
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Vat</th>
                    <td>₱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="is-pulled-right">
                            test
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Total Amount Payable</th>
                    <td>₱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="is-pulled-right">
                            test
                        </span>
                    </td>
                </tr>
            </table>
        </div>

</template>

<script>

    import slipline from './InvoiceSlipLine.vue';

    export default {
        components: { slipline },
        props: ['redirect_url','farm','suppliers','materials'],
        data () {
            return {
                date : moment().format('YYYY-MM-DD'),
                company_id : 2,
                farm_id : this.farm.id,
                supplier_invoice_no : 'Test',
                so_reference_no : 'Charles',
                dr_reference_no : 'Licup',
                total : 0,
                vat_total : 0,
                lines : []
            }
        },

        methods: {
        
            addLine: function(){
                this.lines.push(
                {
                    material_index: 0,
                    material_type: this.materials[0].material_type,
                    material_id: this.materials[0].id,
                    code: this.materials[0].code,
                    description: this.materials[0].description,
                    uom: this.materials[0].uom,
                    kg_weight: this.materials[0].kg_weight,
                    price: this.materials[0].price,
                    vatable:this.materials[0].vatable,
                    quantity: 1,
                });
            },

            updateLine: function(event, ind) {
                this.lines[ind].material_index = event.material_index;
                this.lines[ind].material_type = this.materials[event.material_index].material_type;
                this.lines[ind].material_id = this.materials[event.material_index].id;
                this.lines[ind].code = this.materials[event.material_index].code;
                this.lines[ind].description = this.materials[event.material_index].description;
                this.lines[ind].uom = this.materials[event.material_index].uom;
                this.lines[ind].price = this.materials[event.material_index].price;
                this.lines[ind].kg_weight = this.materials[event.material_index].kg_weight;
                this.lines[ind].vatable = this.materials[event.material_index].vatable;
                this.lines[ind].quantity = event.quantity;
            },

            removeLine: function(ind){
                this.lines.splice(ind, 1);

                for(let i = 0; i < this.lines.length; i++)
                {
                    this.$children[i].material_index = this.lines[i].material_index;
                    this.$children[i].quantity = this.lines[i].quantity;
                }
            },

            submitForm: function() {
                axios.post('/invoices', this.$data)
                    .then(response => window.location.href = this.redirect_url)
                    .catch(errors => console.log(errors));
                //axios.post('/invoices', this.$data).then(response => window.location.href = response.data);
            },
        },
    }
</script>
