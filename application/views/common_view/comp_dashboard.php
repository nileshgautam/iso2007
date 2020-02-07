<style>
    .c1 {

        background-color: #FCFFCD;
    }

    .c2 {

        background-color: #FF0000;
        color: white;
    }

    .c3 {

        background-color: #88BA00;
        color: white;
    }

    .c4 {

        background-color: #1B8F00;
        color: white;
    }

    .c5 {

        background-color: grey;
        color: white;
    }

    .c6 {
        background-color: #CDB79E;
        color: white;
    }
</style>
<div class="container-fluid py-2 ml-0">
    <table class="table-bordered">
        <thead class="bg-primary text-white p-2">
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Progress
                </th>
                <th scope="col">Proportion of ISMS requirements
                </th>
                <th scope="col">Proportion of information security controls
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="bg-dark text-white">Unknown</th>
                <td>Development has barely started and will require significant work to fulfil the requirements</td>
                <td><?php
                    echo (isset($iso['Unknown'])) ?  $iso['Unknown'] . '%' :  "-";
                    ?></td>

                <td><?php echo (isset($annexe['Unknown'])) ? $annexe['Unknown'] . '%' : "-"  ?></td>
            </tr>
            <tr>
                <th scope="row" class="bg-danger text-white">Nonexistent
                </th>
                <td>Complete lack of recognisable policy, procedure, control etc.</td>
                <td><?php echo (isset($iso['Nonexistent'])) ? $iso['Nonexistent'] . '%' : "-" ?></td>
                <td><?php echo (isset($annexe['Nonexistent'])) ? $annexe['Nonexistent'] . '%' : "-" ?></td>
            </tr>
            <tr>
                <th scope="row" class="c2">Initial
                </th>
                <td>Development has barely started and will require significant work to fulfil the requirements</td>
                <td><?php echo (isset($iso['Initial'])) ? $iso['Initial'] . '%' : "-" ?></td>
                <td><?php echo (isset($annexe['Initial'])) ? $annexe['Initial'] . '%' : "-" ?></td>
            </tr>
            <tr>
                <th scope="row" class="c6">Limited

                </th>
                <td>Progressing nicely but not yet complete</td>
                <td><?php echo (isset($iso['Limited'])) ? $iso['Limited'] . '%' : "-"

                    ?></td>
                <td><?php echo (isset($annexe['Limited'])) ? $annexe['Limited'] . '%' : "-" ?></td>
            </tr>
            <tr>
                <th scope="row" class="bg-warning text-white">Defined

                </th>
                <td>Development is more or less complete although detail is lacking and/or it's not yet implemented, enforced and actively supported by top management</td>
                <td><?php echo (isset($iso['Defined'])) ? $iso['Defined'] . '%' : "-" ?></td>
                <td><?php echo (isset($annexe['Defined'])) ?  $annexe['Defined'] . '%' :  "-"; ?>
                </td>
            </tr>
            <tr>
                <th scope="row" class="c3">Managed

                </th>
                <td>Development is complete, the process/control has been implemented and recently started operating</td>
                <td><?php echo (isset($iso['Managed'])) ? $iso['Managed'] . '%' : "-" ?></td>
                <td><?php echo (isset($annexe['Managed'])) ?  $annexe['Managed'] . '%' :  "-" ?></td>
            </tr>
            <tr>
                <th scope="row" class="c4">Optimised

                </th>
                <td>The requirement is fully satisfied, is operating fully as expected, is being actively monitored and improved, and there's substantial evidence to prove all that to the auditors</td>
                <td><?php echo (isset($iso['Optimised'])) ? $iso['Optimised'] . '%' : "-" ?></td>
                <td><?php echo (isset($annexe['Optimised'])) ? $annexe['Optimised'] . '%' :  "-" ?></td>
            </tr>
            <tr>
                <th scope="row" class="c5">Not applicable
                </th>
                <td>ALL requirements in the main body of ISO/IEC 27001 are mandatory IF your ISMS is to be certified. Otherwise, management can ignore them.

                </td>
                <td><?php echo (isset($iso['Not applicable'])) ? $iso['Not applicable'] . '%' : "-"   ?></td>
                <td><?php echo (isset($annexe['Not applicable'])) ? $annexe['Not applicable'] . '%' : "-"  ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th  colspan="2" scope="row" class="center">Total
                </th>

                <td><?php echo "100 %" ?></td>
                <td><?php echo "100 %" ?></td>
            </tr>
        </tfoot>
    </table>

</div>
<div class="container">
    <canvas id="pieChart"></canvas>
</div>
<script>
    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>