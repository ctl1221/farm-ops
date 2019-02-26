<template>

    <div>
        <button @click="addLine">Add Item</button>
        <table class="table is-bordered is-fullwidth">
            <thead>

            <tr>
                <th v-for="field in fields">{{field.name}}</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <gridline 
                    :fields="fields" v-for="(x, index) in gridlines" 
                    :key="index" 
                    :line_index="index"
                    :data="gridlines"
                    @del_is_clicked="removeLine($event)"></gridline>
            </tbody>
        </table>
    </div>

</template>

<script>

    import gridline from './Gridlinecomponent.vue';

    export default {
        components: { gridline },
        props:['fields'],
        data () {
            return {
                gridlines: []
            }
        },

        methods: {
            addLine: function () {
                var line = [];
                for(var i = 0; i < this.fields.length; i++)
                {
                    if(this.fields[i].type == 'text')
                    {
                        line.push('text');
                    }

                    if(this.fields[i].type == 'dropdown')
                    {
                        line.push(['a','b','c']);
                    }

                    if(this.fields[i].type == 'input')
                    {
                        line.push('input');
                    }

                }

                
                this.gridlines.push(line);
            },

            removeLine: function (event) {
                this.gridlines.splice(event.line_index, 1);
            },
        }
    }

</script>
