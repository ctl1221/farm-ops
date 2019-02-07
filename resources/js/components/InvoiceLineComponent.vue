<template>
    <tr>
        <td>
            <select v-model="selected_index">
                <option v-for="(material, index) in materials" :key="index" :value="index">{{material.code}}</option>
            </select>
        </td>
        <td>{{ selDescription }}</td>
        <td>{{ selUom }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td @click="deleteMe">X</td>
    </tr>
</template>

<script>
    export default {
        props : ['materials','selId','selMaterialType','selDescription','selUom'],
        data () {
            return {
                'selected_index': 0,
            }
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
                });
            },
        },
    }
</script>
