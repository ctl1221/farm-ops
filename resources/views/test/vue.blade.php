@extends('master')

@section('content')

<h1>Vue Practice</h1>

<ul>
	<li v-for="x in buildings">@{{ x.name }}</li>
</ul>

<button @click="testMethod">Click Me</button>

@endsection

@section('script')

<script type="text/javascript">
	var vm = new Vue({
	  el: '#root',
	  props: {},
	  data: {
	  	buildings: []
	  },
	  methods: {
	  	testMethod(){
	  		axios.post('/addBuilding').then(response => this.buildings = response.data );
	  	}
	  },

	  mounted(){
	  	axios.get('/allBuildings').then(response => this.buildings = response.data );
	  }
	})
	
</script>

@endsection