<template>

    <form>
        <!-- material slip header -->
        <table class="table is-fullwidth is-bordered">

            <tr bgcolor="#ececec">
                <th colspan="4">
                    <center>Headers</center>
                </th>
            </tr>

            <tr>
                <th>Supplier</th>
                <th>
                </th>
                <th style="width:150px">
                    Document No.
                </th>
                <th style="width:300px">
                    <input type="text" v-model="doc_no" required>
                </th>
            </tr>
            <tr>
                <th style="width:50px">Date</th>
                <th style="width:300px">
                    <input type="date" v-model="date" required>
                </th>
                <th style="width:150px">
                    SO Reference No.
                </th>
                <th style="width:300px">
                </th>
            </tr>
            <tr>
                <th>Farm</th>
                <th>
                </th>
                <th>DR Reference No.</th>
                <th style="width:300px">
                </th>
            </tr>
        </table>

        <!-- material slip details -->
        <table class="table is-bordered is-fullwidth">
            <thead>

            <tr bgcolor="#ececec">
                <th colspan="6">
                    <center>Details</center>
                </th>
            </tr>

            <tr>
                <th rowspan="2">Item Code</th>
                <th rowspan="2">Description</th>
                <th rowspan="2">Batch No</th>
                <th colspan="2">Quantity</th>
<!--                 <th colspan="2">Parallel Quantity</th>
                <th rowspan="2">Stock Type</th> -->
                <th rowspan="2">Action</th>
            </tr>

            <tr>
                <th>Number</th>
                <th>UOM</th>
<!--                 <th>Number</th>
                <th>UOM</th> -->
            </tr>
            </thead>

            <tbody>
                <slipline 
                    v-for="(line, index) in lines"
                    :key="index"

                    :materials="materials" 
                    :item="line"

                    @input-changed="updateLine($event, index)"
                    @del-is-clicked="removeLine(index)">
                </slipline>

                <tr>
                    <td colspan="6" height="40px">
                        <center>
                            <a class="is-info" @click="addLine">--- Add Item ---</a>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- material slip aggregates -->
        <div class="columns">
        <div class="column is-three-quarters">
            <textarea class="textarea" placeholder="e.g. Hello world"></textarea>
        </div>
        <div class=" column">
            <div class="is-pulled-right" style="margin-bottom:1rem">
                <table class="table is-bordered">
                    <tr>
                        <th>Total Weight</th>
                        <td>
                            <span class="is-pulled-right">
                                {{ total_weight | weightFormat }} KG
                            </span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="level is-pulled-right">
                <div class="level-item">
                    <span class="button is-danger">Cancel</span>&nbsp;
                </div>
                <div class="level-item">
                    <input class="button is-success" @click.prevent="submitForm" type="submit" value="Create Material Slip" :disabled="! submittable">
                </div>
            </div>
        </div>
    </div>

    </form>

</template>

<script>

    import slipline from './MaterialSlipLine.vue';

    export default {
        components: { slipline },
        data () {
            return {
                doc_no: '',
                date: moment().format('YYYY-MM-DD'),
                farm_id: 1,
                lines: [],
                materials: [],
            }
        },

        computed: {
            total_weight : function () {

                let x = 0;

                this.lines.forEach(function (line, index) {
                    x += this.materials[line.material_index].kg_weight * line.quantity;
                }, this);

                return x;

            },

            submittable : function () {

                if(this.lines.length <= 0 || ! this.doc_no || ! this.date)
                    return false;

                for(let i = 0; i < this.lines.length; i++)
                {
                    if(this.lines[i].batch_no.length == 0)
                        return false
                }
                return true;
            }
        },

        methods: {
            addLine: function () {

                this.lines.push({
                    material_index: 0,
                    material_id : this.materials[0].id,
                    code : this.materials[0].code,
                    description : this.materials[0].description,
                    uom : this.materials[0].uom,
                    batch_no : '',
                    quantity : 1,
                    parallel_quantity : 1,
                });

            },

            removeLine: function (ind) {

               this.lines.splice(ind, 1);

               for(let i = 0; i < this.lines.length; i++)
                {
                    this.$children[i].material_index = this.lines[i].material_index;
                    this.$children[i].batch_no = this.lines[i].batch_no;
                    this.$children[i].quantity = this.lines[i].quantity;
                    this.$children[i].parallel_quantity = this.lines[i].parallel_quantity;
                }

            },

            updateLine: function(event, ind) {
                this.lines[ind].material_index = event.material_index;
                this.lines[ind].material_id = this.materials[event.material_index].id;
                this.lines[ind].code = this.materials[event.material_index].code;
                this.lines[ind].description = this.materials[event.material_index].description;
                this.lines[ind].uom = this.materials[event.material_index].uom;
                this.lines[ind].batch_no = event.batch_no;
                this.lines[ind].quantity = event.quantity;
                this.lines[ind].parallel_quantity = event.parallel_quantity;
            },

            submitForm: function() {
                axios.post('/receivings',this.$data).then(response => 
                {
                    console.log(response.data);
                });
            },
        },

        mounted () {
            axios.get('/api/getAllFeeds').then(response => 
            {
                this.materials = response.data.feeds;
            });
        }
    }

</script>
