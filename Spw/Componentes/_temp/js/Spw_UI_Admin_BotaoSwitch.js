jQuery(document).ready(function() {
    
    jQuery('#spw-botao-switch-icone-2').hide();
    
    jQuery('#spw-botao-switch-icone-1').click(function() {
        
        jQuery('#spw-botao-switch-icone-1').hide();
        jQuery('#spw-botao-switch-icone-2').show();
        jQuery('#spw-botao-switch-box').show();
        
                
    });
    
    jQuery('#spw-botao-switch-icone-2').click(function() {
        
        jQuery('#spw-botao-switch-icone-1').show();
        jQuery('#spw-botao-switch-icone-2').hide();
        jQuery('#spw-botao-switch-box').hide();
        
    });
    
    
    jQuery('.spw-ui-admin-botao-switch .spw-item a').click(function() {
        
        event.preventDefault();
        var texto = jQuery(this).text();
        
        jQuery('#spw-texto').text(texto);
        jQuery('#spw-botao-switch-icone-1').show();
        jQuery('#spw-botao-switch-icone-2').hide();
        jQuery('#spw-botao-switch-box').hide();
        
    });
    
    
    
});


