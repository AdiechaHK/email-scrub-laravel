GetModelFromIdAndType : function( id , type )
{
	var url = "/api/connect/config/v1/maps/" ;
	if( type === "FLOOR" )
	{
			url = "floor/" + id ;
	}
	else if( type === "building" )
	{
			url = "building/" + id ;
	}
	else if( type === "campus" )
	{
			url = "campus/" + id ;
	}
	else if( type === "supernode" )
	{
			url = "building/" + id ;
			url = "campus/" + id ;

	}
	
	$.ajax({
		url : url ,
		success : function(data){
			console.log(data) ;
			// set data to collection.
			
			// if collection.count is greater then expected value
			// start rendering
		},
		error : function(){
			console.log("Error in downloading the data from " + url ) ;
		}
	
	});
}

// in filter function.
// for empty search string get data from json.

// Function for searching parents id and type.
extractParentAndCall : function( data )
{
	if( data.userLevel === false )
	{
		var parentType ;
		if( data.level === "Zone" )
		{
			parentType = "Floor" ;
		}
		else if( data.level === "Floor" )
		{
			parentType = "Building" ;
		}
		else if( data.level === "Building" )
		{
			parentType = "campus" ;
		}
		else if( data.level === "supernode" )
		{
			parentType = "supernode" ;
		}
		
		_.each( function( element , index , list ){
			
			if( element.userLevel === false )
			{
				this.GetModelFromIdAndType( element.id , parentType ) ;
			}
		
		} ) ;
	}
}

// Search API call back will call this function.
ArrangeChildParent : function() {
	
}