<?php

session_start();
$Id = $_SESSION["userId"];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <title>Expenses Tracker</title>
</head>
<body>
    <a href="php/logout.php" class="btn btn-secondary btn-lg active float-right" role="button" aria-pressed="true">LogOut</a>

     <!-- popup form item-->
     <div id="modalDialog" class="modal">
        <div class="modal-content animate-top">
            <div class="modal-header">
                <h5 class="modal-title">Add items</h5>
                <button id="itemClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" id="contactFrm">
                <div class="modal-body">
                    <!-- Form submission status -->
                    <div class="response"></div>

                    <!-- Contact form -->
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number"  id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="expense_date">Date:</label>
                        <input type="date" id="expenseDate" name="expenseDate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" id="categoryName" name="categoryName" class="form-control" required>
                    </div>
                    <input type="hidden" id="userIdForCateg" name="userId" value="<?php echo $Id ?>">


                </div>
                <div class="modal-footer">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- popup form categ-->
    <div id="modalDialogCateg" class="modal">
        <div class="modal-content animate-top">
            <div class="modal-header">
                <h5 class="modal-title">Add category</h5>
                <button id="categClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" id="contactFrmCateg">
                <div class="modal-body">
                    <!-- Form submission status -->
                    <div class="response"></div>

                    <!-- Contact form -->
                    <div class="form-group">
                        <label for="amount">Catgory Name:</label>
                        <input type="text" name="catgoryName" id="categName" class="form-control" required>
                    </div>
                    <input type="hidden" id="userIdForCateg" name="userId" value="<?php echo $Id ?>">

                </div>
                <div class="modal-footer">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <button type="button" id="add_item" class="btn btn-success m-3">Add Item</button>
    <button type="button" id="add_categ" class="btn btn-success ml-3">Add Categ</button>

    <div class="container">
        <h2>Expenses</h2>
        
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">date</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <!-- <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
            </tr> -->
            </tbody>
        </table>
    </div>

    <div class="container">
            <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="col-sm-8 col-md-6">
                            <div class="card">
                                <div class="card-header">Expenses chart</div>
                                <div class="card-body" style="height: 420px">
                                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <script>
        async function fetchExpenses(){
				const response = await fetch('http://localhost/expense-tracker/php/expenses.php?id=<?php echo $Id ?>');
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				const results = await response.json();
				return results; 
			}

            fetchExpenses().then(results => {
                        for(var i =0; i < results.length; i++){
                            let row = 
                                        `
                                            <tr>
                                                <th scope="row"></th>
                                                <td>${results[i].Name}</td>
                                                <td>${results[i].Value}</td>
                                                <td>${results[i].Date}</td>
                                            </tr>
                                        `;
                            //console.log(row);
                            $('#myTable').append(row);
                        }
                    }).catch(error => {
                        console.log(error.message);
                    });

        //  <!-- add itmes using popup -->

        // Get the modal
        var modal = $('#modalDialog');

        // Get the button that opens the modal
        var btn = $("#add_item");

        // Get the <span> element that closes the modal
        var itemSpan = $("#itemClose");

        // When the user clicks anywhere outside of the modal, close it
        $('body').bind('click', function (e) {
            if ($(e.target).hasClass("modal")) {
                modal.hide();
            }
        });

        $(document).ready(function () {
            // When the user clicks the button, open the modal 
            btn.on('click', function () {
                modal.show();
            });

            // When the user clicks on <span> (x), close the modal
            itemSpan.on('click', function () {
                modal.hide();
            });
        });


        // add items 

        async function postItem(){
			try{
				result = await $.ajax({
					type: "POST",
                    data: $("#contactFrm").serialize(),
                    url: "http://localhost/expense-tracker/php/addItem.php",
                    success:  function(data){
                                    const myJSON = JSON.parse(data); 
                                    //console.log(myJSON);
                                    let row2 = 
                                                `
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td>${myJSON["categoryName"]}</td>
                                                        <td>${myJSON["amount"]}</td>
                                                        <td>${myJSON["expenseDate"]}</td>
                                                    </tr>
                                                `;
                                    $('#myTable').append(row2);
				    },
                    error: function(xhr, status, error){
					    console.log(error);
				    } 
				})
			}catch(error) {
				console.log(error);
			}
		}

        async function getChart(){
			try{
				result = await $.ajax({
					type: "GET",
                    data: $("#contactFrm").serialize(),
                    url: "http://localhost/expense-tracker/php/getChart.php",
                    success: function  (data){
                        const myJSONchart = JSON.parse(data);
                        var names =[];
                        var sums = [];
                        for (var k = 0; k < myJSONchart.length; k++){
                            names.push(myJSONchart[k].Name);
                            sums.push(myJSONchart[k].sum);
                        }
       
                        // PIE CHART SCRIPT
                        var ctx = $("#chart-line");
                        var myLineChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:names ,
                                datasets: [{
                                    data: sums,
                                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: 'Expenses'
                                }
                            }
                        });
                       
                        //console.log(names);
                        //console.log(sums);
                        //return {names, sums};
				    },
                    error: function(xhr, status, error){
					    console.log(error);
				    } 
				})
			}catch(error) {
				console.log(error);
			}
		}

        $(document).ready(function () {
            $('#contactFrm').submit(async function (e) {
                e.preventDefault();
                $('.modal-body').css('opacity', '1');
                //$('.btn').prop('disabled', true);
                await postItem();
                await getChart();
               
                modal.hide();


                /* var amount = $("#amount").val();
                var expense_date = $("#expense_date").val();
                var category = $("#category").val(); */


            });
        });




         //  <!-- add categ using popup -->

        // Get the modal
        var categModal = $('#modalDialogCateg');

        // Get the button that opens the modal
        var categBtn = $("#add_categ");

        // Get the <span> element that closes the modal
        var categSpan = $("#categClose");

        // When the user clicks anywhere outside of the modal, close it
        $('body').bind('click', function (e) {
            if ($(e.target).hasClass("modal")) {
                categModal.hide();
            }
        });

        $(document).ready(function () {
            // When the user clicks the button, open the modal 
            categBtn.on('click', function () {
                categModal.show();
            });

            // When the user clicks on <span> (x), close the modal
            categSpan.on('click', function () {
                categModal.hide();
            });
        });





        // add categ 

        async function postCateg(){
			try{
				result = await $.ajax({
					type: "POST",
                    data: $("#contactFrmCateg").serialize(),
                    url: "http://localhost/expense-tracker/php/addCateg.php",
                    success: function(data){
                       // var json = JSON.parse(data);
                        console.log(data);
				    },
                    error: function(xhr, status, error){
					    console.log(error);
				    } 
				})
			}catch(error) {
				console.log(error);
			}
		}

        $(document).ready(function () {
            $('#contactFrmCateg').submit(function (e) {
                e.preventDefault();
                $('.modal-body').css('opacity', '1');
                //$('.btn').prop('disabled', true);
                postCateg();
                categModal.hide();

                /* var amount = $("#categName").val(); */
                
            });
        });

        

        $(document).ready(function () {
            async function fetchChart(){
				const response = await fetch('http://localhost/expense-tracker/php/getChart.php?id=<?php echo $Id ?>');
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				const results = await response.json();
				return results; 
			}

            fetchChart().then(results => {
                            //const myJSONchart1 = JSON.parse(results);
                            var names =[];
                            var sums = [];
                            for (var j = 0; j < results.length; j++){
                                names.push(results[j].Name);
                                sums.push(results[j].sum);
                            }
        
                            // PIE CHART SCRIPT
                            var ctx = $("#chart-line");
                            var myLineChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels:names ,
                                    datasets: [{
                                        data: sums,
                                        backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: 'Expenses'
                                    }
                                }
                            });
                        }).catch(error => {
                            console.log(error.message);
                        });
        });



    </script>
    
    
</body>
</html>