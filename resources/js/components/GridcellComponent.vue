<template>
    <div>
        <span v-if="type=='text'">{{ value }}</span>


        <div v-if="type=='dropdown'" class="select" >
            <select>
                <option v-for="x in value">{{x}}</option>
            </select>
        </div>
        
        <input v-if="type=='input'" :value="value" class="input" >
    </div>
</template>

<script>

    export default {
    	props: [
    		'type',
            'value',

    	],
        data () {
            return {

            }
        }
    }

</script>
