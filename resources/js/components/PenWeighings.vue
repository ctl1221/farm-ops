<template>
    <table class="table is-bordered is-fullwidth">
        <thead>
            <tr>
                <th>Day</th>
                <th>Weigh No</th>
                <th>Pen 1</th>
                <th>Pen 2</th>
                <th>Pen 3</th>
                <th>Pen 4</th>
                <th>Pen 5</th>
                <th>Pen 6</th>
                <th>Pen 7</th>
            </tr>
        </thead>

        <tbody>  
                <tr v-for="(x, x_index) in current_weighings">
                    <td v-if="x_index % n_weighings == 0" :rowspan="n_weighings">{{ x.day.day }}</td>
                    <td>{{ x.weigh_no }}</td>
                    <td v-for="(y, y_index) in x.pen_weighings">
                        <input 
                            :class="classObject[x_index][y_index]" 
                            :value="weight[x_index][y_index]" 
                            @input="updateWeight(y.id , $event.target.value, x_index, y_index)">
                    </td>
                </tr>
        </tbody>
    </table>

</template>

<script>
    export default {
        props: ['current_weighings','n_weighings'],
        data() {
            return {
                weight: [],
                classObject: [],
            }
        },
        methods: {
            updateWeight(id, value, x_index, y_index)
            {
                //alert('The input with ID ' + id + ' will change value to ' + value);
                axios.post('/penWeighings/' + id, {
                    weight : value
                }).then( response => {
                    this.weight[x_index][y_index] = value;
                    this.classObject[x_index][y_index]['is-danger'] = false;
                }).catch( errors => {
                    this.classObject[x_index][y_index]['is-danger'] = true;
                    this.weight[x_index][y_index] = value;
                });
            }
        },

        created() {

            this.current_weighings.forEach(function(x){
                let i = [];
                let j = [];
                x.pen_weighings.forEach(function(y){
                    i.push(y.weight);
                    j.push({
                        'input': true, 
                        'is-small': true,
                        'is-danger': false,
                    });
                });
                this.weight.push(i);
                this.classObject.push(j);
            }, this);
        }
    }
</script>
