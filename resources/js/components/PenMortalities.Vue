<template>
<table class="table is-narrow is-bordered is-striped is-fullwidth" >
        <thead>
            <tr>
                <th></th>
                <th class="has-text-centered" colspan="7">A.M.</th>
                <th class="has-text-centered" colspan="7">P.M.</th>
                <th class="has-text-centered">
                    <a class="tooltip is-tooltip is-small" style="border-color:white" data-tooltip="Refresh To Update">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </th>
            </tr>
            <tr>
                <th class="has-text-centered">Day</th>
                <th class="has-text-centered">Pen 1</th>
                <th class="has-text-centered">Pen 2</th>
                <th class="has-text-centered">Pen 3</th>
                <th class="has-text-centered">Pen 4</th>
                <th class="has-text-centered">Pen 5</th>
                <th class="has-text-centered">Pen 6</th>
                <th class="has-text-centered">Pen 7</th>
                <th class="has-text-centered">Pen 1</th>
                <th class="has-text-centered">Pen 2</th>
                <th class="has-text-centered">Pen 3</th>
                <th class="has-text-centered">Pen 4</th>
                <th class="has-text-centered">Pen 5</th>
                <th class="has-text-centered">Pen 6</th>
                <th class="has-text-centered">Pen 7</th>
                <th class="has-text-centered">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(x, x_index) in current_days" :key="x_index">
                <td class="has-text-centered">{{ x.day }}</td>
                <td v-for="(y, y_index) in x.mortalities" :key="y_index" class="has-text-centered">
                    <input 
                        :class="classObject[x_index][y_index]" 
                        :value="dead_birds[x_index][y_index]" 
                        @input="updateQuantity(y.id , $event.target.value, x_index, y_index)">
                </td>
                <td class="has-text-centered">{{ total_per_day[x_index] }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['current_days'],
        data() {
            return {
                dead_birds: [],
                classObject: [],
            }
        },

        computed: {
            total_per_day: function () {

                let total = [];

                this.dead_birds.forEach(function(x){
                    let count = 0;
                    x.forEach(function(y){
                        count += y;
                    });
                    total.push(count);
                }, this);

                return total;
            }
        },

        methods: {
            updateQuantity(id, value, x_index, y_index)
            {
                //alert('The input with ID ' + id + ' will change value to ' + value);
                axios.post('/mortalities/' + id, {
                    quantity : value
                }).then( response => {
                    this.dead_birds[x_index][y_index] = value;
                    this.classObject[x_index][y_index]['is-danger'] = false;
                }).catch( errors => {
                    this.classObject[x_index][y_index]['is-danger'] = true;
                    this.dead_birds[x_index][y_index] = value;
                });
            }
        },

        created() {

            this.current_days.forEach(function(x){
                let i = [];
                let j = [];
                x.mortalities.forEach(function(y){
                    i.push(y.quantity);
                    j.push({
                        'input': true, 
                        'is-small': true,
                        'is-danger': false,
                    });
                });
                this.dead_birds.push(i);
                this.classObject.push(j);
            }, this);
        }
    }
</script>
