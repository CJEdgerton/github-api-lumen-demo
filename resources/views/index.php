<!DOCTYPE html>
<html>
<head>
	<title>Popular PHP Repos</title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body id="app">

	<div class="container">

		<h1 class="text-center">Most Starred PHP Repositories on GitHub</h1>

		<hr>

		<div class="row">

			<div class="col-md-10 col-md-offset-1">

				<form class="form-horizontal">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
							<input type="text" class="form-control" name="query" v-model="searchQuery" placeholder="Search">
						</div>
					</div>
				</form>

				<repos
				    :data="gridData"
				    :columns="gridColumns"
				    :filter-key="searchQuery"
				>
				</repos>

			</div>
		</div>
	</div>

	<template id="repos-template">

		<table class="table table-hover">

			<thead>
				<tr>
					<th 
						v-for="key in columns"
						@click="sortBy(key.name)"
						:class="{active: sortKey == key.name}"
						class="cursor-pointer"
					>
						{{key.display | capitalize}}
						<span class="arrow" :class="sortOrders[key.name] > 0 ? 'asc' : 'dsc'">
						</span>
					</th>
				</tr>
			</thead>

			<tbody>
				<tr 
					v-for="entry in data | filterBy filterKey | orderBy sortKey sortOrders[sortKey]"
					@click="showRepo(entry)"
					class="cursor-pointer"
				>
					<td v-for="key in columns">
						{{entry[key.name]}}
					</td>
				</tr>
			</tbody>

		</table>

		<div id="repoDetailsModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="text-center">
							<a href="{{selectedRepo.url}}" target="_blank">{{ selectedRepo.name | capitalize}}</a>
						</h2>
					</div>
					<div class="modal-body">
						<p class="lead text-center">{{ selectedRepo.description }}</p>
						<div class="row">
							<div class="col-md-6">
								<h3 class="text-center">
									<span class="small">Created By:</span> 
									<a href="{{ selectedRepo.owner_url }}" target="_blank">
										{{ selectedRepo.owner_username }}
									</a>
								</h3>
								<a href="{{ selectedRepo.owner_url }}" target="_blank">
									<img src="{{ selectedRepo.owner_avatar_url }}" class="owner-avatar img-responsive">
								</a>
							</div>

							<div class="col-md-6">

								<h3 class="text-center">Stats</h3>
							
								<dl class="dl-horizontal">

									<dt>Created On:</dt>
									<dd>{{ selectedRepo.created_date }}</dd>

									<dt>GitHub URL:</dt>
									<dd>
										<a href="{{ selectedRepo.url }}" target="_blank">{{ selectedRepo.url }}</a>
									</dd>	

									<dt v-show="selectedRepo.homepage">Homepage:</dt>
									<dd>
										<a href="{{ selectedRepo.homepage }}" target="_blank">{{ selectedRepo.homepage }}</a>
									</dd>

									<dt>Last Push:</dt>
									<dd>{{ selectedRepo.last_push_date }}</dd>

									<dt>Star Count:</dt>
									<dd>{{ selectedRepo.star_count }}</dd>

									<dt>Fork Count:</dt>
									<dd>{{ selectedRepo.forks_count }}</dd>

									<dt>Open Issues:</dt>
									<dd>{{ selectedRepo.open_issues_count }}</dd>

								</dl>

							</div>

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</template>

	<script src="js/main.js"></script>

</body>
</html>