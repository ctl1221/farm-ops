<template slot="title">Create New Chick Loading</template>

<template slot="body">
	<form method="POST" action='/loadings'>
		@csrf
		<div class="columns">
			<div class="column">
				<input type="hidden" v-model="farm_id" value="{{ $farm->id }}">

				<div class="field">
				  <label class="label">Date</label>
				  <div class="control">
				    <input class="input" type="date" v-model="date">
				  </div>
				</div>
				
				<div class="field">
				  <label class="label">Hatchery Source</label>
				  <div class="control">
				    <input class="input" type="text" v-model="hatchery_source" placeholder="hatchery source">
				  </div>
				</div>

				<div class="field">
				  <label class="label">Source Identification</label>
				  <div class="control">
				    <input class="input" type="text" v-model="source_id" placeholder="source identification">
				  </div>
				</div>

			</div>

			<div class="column">
				
				<div class="field">
				  <label class="label">Time Dep. Hatchery</label>
				  <div class="control">
				    <input class="input" type="time" v-model="dep_hatchery">
				  </div>
				</div>
				

				<div class="field">
				  <label class="label">Time Arr. Farm</label>
				  <div class="control">
				    <input class="input" type="time" v-model="arr_farm">
				  </div>
				</div>

				

				<div class="field">
				  <label class="label">Time Dep. Farm</label>
				  <div class="control">
				    <input class="input" type="time" v-model="dep_farm">
				  </div>
				</div>
				

			</div>

			<div class="column">
				<div class="field">
				  <label class="label">Truck Plate No.</label>
				  <div class="control">
				    <input class="input" type="text" v-model="truck_plate_no" placeholder="truck plate no">
				  </div>
				</div>
				
				<div class="field">
				  <label class="label">Trucker's Name</label>
				  <div class="control">
				    <input class="input" type="text" v-model="trucker_name" placeholder="trucker's name">
				  </div>
				</div>
				
				<div class="field">
				  <label class="label">Seal No.</label>
				  <div class="control">
				    <input class="input" type="text" v-model="seal_no" placeholder="seal no">
				  </div>
				</div>
			</div>

			<div class="column">
				<div class="field">
				  <label class="label">Total Birds Delivered</label>
				  <div class="control">
				    <input class="input" type="text" v-model="total_delivered" placeholder="total delivered">
				  </div>
				</div>
				
				<div class="field">
				  <label class="label">Dead On Arrival</label>
				  <div class="control">
				    <input class="input" type="text" v-model="doa" placeholder="doa">
				  </div>
				</div>
				
				<div class="field">
				  <label class="label">Net Chicks Received</label>
				  <div class="control">
				    <input class="input" type="text" v-model="net_received" placeholder="net chicks received">
				  </div>
				</div>
			</div>			
		</div>
		
		<div class="field">
		  <label class="label">Notes</label>
		  <div class="control">
		    <textarea class="textarea" v-html="notes"></textarea>
		  </div>
		</div>
		


		<div class="field">
		  <div class="control">
		    <input @click.prevent="submitForm" type="submit" class="button is-info is-outlined">
		  </div>
		</div>
		
		
	</form>
</template>