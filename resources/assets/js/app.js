
// Repo table component
var repos = Vue.extend({
	template: '#repos-template',
	props: {
		data: Array,
		columns: Array,
		filterKey: String
	},
	data: function () {
		var sortOrders = {};
		this.columns.forEach(function (key) {
			sortOrders[key.name] = 1
		});
		return {
			sortKey: '',
			sortOrders: sortOrders,
			selectedRepo: {}
		}
	},
	methods: {
		sortBy: function (key) {
			this.sortKey = key;
			this.sortOrders[key] = this.sortOrders[key] * -1;
		},
		showRepo: function (repo) {
			$('#repoDetailsModal').modal('toggle');
			this.selectedRepo = repo;
		}
	}
});

// Register the component
Vue.component('repos', repos);

// Vue instance
var app = new Vue({
	el: '#app',
	data: {
		searchQuery: '',
		gridColumns: [
			{
				name :'id', 
				display: 'Repo ID'
			},
			{
				name :'name', 
				display: 'Repo Name'
			},
			{
				name :'owner_username', 
				display: 'Owner'
			},
			{
				name :'created_date', 
				display: 'Created On'
			},
			{
				name :'star_count', 
				display: 'Stars'
			},
		],
		gridData: []
	},
	created: function() {
		$.getJSON('/repo_list', function(data) {
			this.gridData = data;
		}.bind(this));
	}
});
