        $(document).ready(function(){

                //Si l'usuari vol tancar la sessió
                $("#exit").click(function(){
                        var exit = confirm("Estas segur que vols abandonar la sessio?");
                        if(exit==true){
                            window.location = 'index.php';}		
                });
                
                $("#enter").click(function(){
                        
                    user=$("#name").val();
                    pass=$("#pass").val();
                    
                    credencials={usuari:user,password:pass};
                    
                    if(user=="" || pass==""){
                        $('.error').show();
                        $('.error').html('Siusplau introdueix usuari i contrassenya');
                    }else{

                            $.ajax({
                                    type: 'GET',
                                    url:  './controllers/controller.php',
                                    dataType: 'json',
                                    contentType: "application/json; charset=utf-8",
                                    data: {
                                        credencials: JSON.stringify(credencials)
                                    },
                                    success: function(suc) {

                                        if(suc.resposta==1){
                                            $('.error').hide();
                                            $("#loginform").hide();
                                            $('#wrapper').show();
                                            $('#nom').html(user);
                                        }else{
                                            $('.error').show();
                                            $('.error').html('Usuari o contrassenya incorrectes');
                                        }
                                    },
                                    error: function() {alert('An error occurred!');}
                                    });
                            }
                    });
                    
                    //
                    
                    $("#mdadesc").click(function(){

                    clients={client:"llistaclient"};

                        $.ajax({
                                type: 'GET',
                                url:  './controllers/controller.php',
                                dataType: 'json',
                                contentType: "application/json; charset=utf-8",
                                data: {
                                    mclients: JSON.stringify(clients)
                                },
                                success: function(suc) {
                                    
                                    filesTaula="";
                                    
                                    $.each(suc, function(i, client) {
                                        if(client.nom != 'Administrador'){
                                                filesTaula=filesTaula+'<tr><td><input type="text" value="'+client.id+'"/></td><td><input type="text" value="'+client.nom+'"/></td><td><input type="text" value="'+client.adreca+'"/></td><td><input type="text" value="'+client.ciutat+'"/></td><td><input type="checkbox"/></td></tr>';
                                            }else{
                                                filesTaula=filesTaula+'<tr><td><input type="text" value="'+client.id+'" disabled/></td><td><input type="text" value="'+client.nom+'" disabled/></td><td><input type="text" value="'+client.adreca+'" disabled/></td><td><input type="text" value="'+client.ciutat+'" disabled/></td><td><input type="checkbox" disabled/></td></tr>';
                                            }
                                    });
                                    alert(filesTaula);
                                    
                                    $("#clienttb").html(filesTaula);
                                    
                                },
                                error: function() {alert('An error occurred!');}
                        });
                            
                    });
                    
                    
                    $("#edadesc").click(function(){

                    clients={client:"esborraclient"};
                    
                    for(i=0;i<$("#clienttb input[type=checkbox]").length;i++){
                        if($("#clienttb input[type=checkbox]").eq(i).is(':checked'))alert(i);
                    }
                    
                    
                    //$(this).is(':checked')

                        $.ajax({
                                type: 'DELETE',
                                url:  './controllers/controller.php',
                                dataType: 'json',
                                contentType: "application/json; charset=utf-8",
                                data: {
                                    mclients: JSON.stringify(clients)
                                },
                                success: function(suc) {
                                    
                                    
                                    
                                },
                                error: function() {alert('An error occurred!');}
                        });
                            
                    });
                    
        }); 

