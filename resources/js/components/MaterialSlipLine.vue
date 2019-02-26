<template>
	<tr>
		<td>{{item.code}}</td>

		<td>
			<div class="select">
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

		<td><input type="text" v-model="batch_no" required></td>

		<td><input v-model="quantity"></td>
		<td>{{ item.uom }}</td>
<!-- 		<td><input v-model="parallel_quantity"></td>
		<td>{{ item.uom }}</td>
		<td>X X</td> -->

		<td>
			<a @click="$emit('del-is-clicked')">Delete Me</a>
		</td>
	</tr>
</template>

<script>

    export default {
    	props: ['materials','item'],
        data () {
            return {
            	material_index : 0,
            	batch_no : this.item.batch_no,
            	quantity : this.item.quantity,
            	parallel_quantity : this.item.parallel_quantity,	
            }
        },

        computed: {
        	inputs: function () {
        		return `${this.material_index}|${this.batch_no}|${this.quantity}|${this.parallel_quantity}|`;
        	}
        },

        watch: {
        	inputs: function (val, oldVal){
        		this.$emit('input-changed', this.$data);
        	},
        },
    }

</script>
