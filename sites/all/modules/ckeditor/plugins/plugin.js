(function ($) {
	CKEDITOR.plugins.add( 'doublecolumn',
	{
	    init: function( editor )
	    {
	        editor.addCommand( 'insertDoubleColumn',
	            {
	                exec : function( editor )
	                {
	                    editor.insertHtml('<div style="half-width"></div><div style="half-width"></div><div class="clearfix"></div>');
	                }
	            });
	        editor.ui.addButton( 'doublecolumn',
	        {
	            label: 'Double Columns',
	            command: 'insertDoubleColumn',
	            icon: this.path + 'v.png'
	        } );
	    }
	} );
})(jQuery);
