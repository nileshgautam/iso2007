<h2 class="text-center mb-2"> ISO 27001 Gap Analysis Tools</h2>
<div class="container">
    <h3>ISO 27001 Requirement</h3>
    <div class="accordion" id="accordionExample">
        <?php
        for ($i = 0; $i < count($main_content); $i++) {
            ?>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link main_heading" id="<?php echo $main_content[$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
                            <?php echo ($main_content[$i]['clause_section']) . ": " . $main_content[$i]['title']; ?>
                        </button>
                    </h2>
                </div>
                <div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body subsection">
                        <?php echo $main_content[$i]['title']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
         <!-- <a class="btn btn-link btn-primary text-white offset-11" href="<?php echo base_url('Home/annex_view/') . $id ?>">Next</a> -->
        <input type="hidden" id="com_id" value="<?php echo $id ?>">
    </div>
</div>

<div class="container">
    <h3>Annex A controls</h3>
    <div class="accordion" id="AccordionExample">
        <?php
        for ($i = 0; $i < count($annex_data); $i++) {
            ?>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link main_heading" id="<?php echo $annex_data[$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
                            <?php echo ($annex_data[$i]['clause_section']) . ": " . $annex_data[$i]['title']; ?>
                        </button>
                    </h2>
                </div>
                <div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body subsection">

                        <!-- new accordain-->
                        <!-- close -->
                        <?php echo $annex_data[$i]['title']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a class="btn offset-11 btn-primary text-white btn-link" href="<?php echo base_url('Home/thank_you/').$id?>">save</a>
    </div>
</div>
<script>
    $(document).ready(function() {
        let company_responce = [];
        let c_id = $('#com_id').val();
        comp_id = {
            comp: c_id
        }
        $.ajax({
            type: "POST",
            url: baseUrl + "Home/company_responce",
            data: comp_id,
            success: function(comp_responce) {


                obj = JSON.parse(comp_responce)
                // console.log(obj)
                company_responce = obj;
            },
            error: function() {
                console.log("error logind data")
            }
        });

        $('.main_heading').click(function() {
            let id = $(this).attr('id')
            let question = {
                qid: id
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "Home/get_data",
                data: question,
                success: function(newquestion) {

                    obj = JSON.parse(newquestion)
                    // console.log(obj)
                    populate_data(obj)
                },
                error: function() {
                    console.log("error logind data")
                }
            });

        });

        function populate_data(obj) {
            // console.log(obj)
            let html = ""
            html = `<ul>`
            for (let i = 0; i < obj.length; i++) {

                let r = company_responce.find((item) => {
                    let itemobj = JSON.parse(item.question_responce);
                    let firstkey = Object.keys(itemobj)[0];
                    firstkey = firstkey.replace(/_/g, '.');
                    return firstkey.startsWith(obj[i]['sub_title_code'])

                })
                //console.log(r);
                let tickhtml = "";
                if (r) {
                    tickhtml = "ok";
                }
                html += `<a href="<?php echo base_url('Home/question_view/') ?>${obj[i]['sub_title_code']}"  attr="${obj[i]['sub_title_code']}"><li class="btn-link anchr" ><span>${obj[i]['sub_title_code']}</span> ${obj[i]['sub_title']} ${tickhtml}</li>`
            }
            html += `</ul>`
            $(".subsection").html(html)
        }

        $("#accordionExample").on('click', 'li', function() {
            let id = $(this).parent().attr('attr')
        });

    });
</script>
<style>
    ul {
        list-style-type: none;
    }
</style>