
let id_animal = $("input[name*='animal_id']");
id_animal.attr("readonly", "readonly");

$(".btnedit").click(e => {
    let textvalues = displayData(e);
    let specie = $("input[name*='animal_species']");
    let rasa = $("input[name*='animal_race']");
    let nume = $("input[name*='animal_name']");
    let stagiu = $("input[name*='life_stage]");
    let castrat = $("input[name*='neutered']");

    id_animal.val(textvalues[0]);
    specie.val(textvalues[1]);
    rasa.val(textvalues[2]);
    nume.val(textvalues[3]);
});

function displayData(e){
    let index = 0;
    const table_data = $("#tbody tr td");
    let textvalues = [];

    for(const [key, value] of Object.entries(table_data)){
        if(typeof(value.dataset) == 'undefined'){
            //pass
        }
        else
        {
            if(value.dataset.id === e.target.dataset.id)
                textvalues[index++] = value.textContent;
        }
    }
    return textvalues;
}