<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8"/>
        <title>The Local Weather Update For Your City!</title>
        
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    
    <body>
        <header><center>
            <h1>The Local Weather Update Based On Your City</h1>
            <form action="#"></form>
            <h2>Enter The Zip Code From Your City: <input id="zip" type="text" name="keyword"></h2>
            </form><br>
            <h3><span id="zipCodeError"></h3></span>
        </header></center>

        <div class="card1">
        <table>
        <tr><center><span id="city"></span></center></tr>
        </table>
        </div>
        <br><br>
        <body class='text-center'>
        <a id="recentZipCodeLink" href="/getKeywords">Recent Zip Code Searches</a>
        
        <div class="card2">
        <center><table>
        <tr><td id="td1">Current Temperature For Your City :</td><td id="td2"><span id="currentTemp"></span></td><td id="td3">Fahrenheit For City</td></tr>
        <tr><td id="td1">Wind Speed For Your City:</td><td id="td2"><span id="windSpeed"></span><td id="td3">Miles Per Hour For City</td></td></tr>
        <tr><td id="td1">Wind Direction For Your City:</td><td id="td2"><span id="windDirection"></span></td><td id="td3">Degrees For City</td></tr>
        </table></center>
        </div>
        
      
    <script>
        
        $("#zip").on("change", function(){
            $.ajax({
                method:     "GET",
                url:        "https://cst336.herokuapp.com/projects/api/cityInfoAPI.php",
                dataType:   "json",
                data:       {"zip": $("#zip").val() },
                success:    function(result,status){
                
                    if(result == false){
                        $("#zipCodeError").html("Zip Code Not Found! Please Enter Another Zip Code That Is Valid");
                        $("#zipCodeError").css("color","red");
                        $("#form")[0].reset();
                    }
                    else{
                        $("#zipCodeError").html("We Found Your Zip Code! Here Are The Updates");
                        $("#zipCodeError").css("color","green");
                    }
                }
            });
                
            $.ajax({
                method:     "GET",
                url:        "https://api.openweathermap.org/data/2.5/weather?",
                dataType:   "json",
                data:       {"zip": $("#zip").val(), "units": "imperial", "appid": "9fba04539a292530875402ca73837409" },
                success:    function(result,status){
                    
                    $("#city").html(result.name);
                    $("#currentTemp").html(result.main.temp);
                    $("#windSpeed").html(result.wind.speed);
                    $("#windDirection").html(result.wind.deg);
                }
            });
            
        });
    </script>    
    </body>
</html>