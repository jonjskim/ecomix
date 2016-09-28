<div id="search">	
	<div id='cse' style='width: 25%; margin-left: 900px;'>Loading</div>
	<script src='//www.google.com/jsapi' type='text/javascript'></script>
	<script type='text/javascript'>
		google.load('search', '1', {language: 'en', style: google.loader.themes.V2_DEFAULT});
		google.setOnLoadCallback(function() {
		  var customSearchOptions = {};
		  var orderByOptions = {};
		  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
		  customSearchOptions['enableOrderBy'] = true;
		  customSearchOptions['orderByOptions'] = orderByOptions;
		  var imageSearchOptions = {};
		  imageSearchOptions['layout'] = 'google.search.ImageSearch.LAYOUT_CLASSIC';
		  customSearchOptions['enableImageSearch'] = true;
		  customSearchOptions['overlayResults'] = true;
		  var customSearchControl =   new google.search.CustomSearchControl('008238431741413278102:ool9jmi2mqu', customSearchOptions);
		  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
		  var options = new google.search.DrawOptions();
		  options.setAutoComplete(true);
		  customSearchControl.draw('cse', options);
		}, true);
	</script>
<div>	