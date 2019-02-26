<template>
	<tr>
		<td v-for="(field, index) in fields" >
		    <gridcell 
		    	:value="data[index]"
			    :key="index"
			    :type="field.type" 	>
		    </gridcell>
		</td>

		<td>
			<button @click="$emit('del_is_clicked',{line_index})">Delete Me</button>
		</td>
	</tr>
</template>

<script>

	import gridcell from './Gridcellcomponent.vue';

    export default {
    	components: { gridcell },
    	props: [
    		'fields',
    		'line_index',
    		'data'
    	],
        data () {
            return {

            }
        }
    }

</script>
