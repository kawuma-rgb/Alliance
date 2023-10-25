//declaring variables and picking up elements
let save_button=document.querySelector('#save')
let next_button=document.querySelector('#next')



// students image

const img = document.querySelector('#pic');
const file = document.querySelector('#file');
const btn = document.querySelector('#label')
file.addEventListener('change',function(){
    const choosedFile = this.files[0];
    if(choosedFile){
        const reader = new FileReader();
        reader.addEventListener('load',function(){
            img.setAttribute('src',reader.result);

        });
reader.readAsDataURL(choosedFile);

    }
    btn.style.display="none";
})



function grade(){
    //===============total points==================================================================
//total points for English
let eng_inputs=document.querySelectorAll('.eng');
console.log(eng_inputs[3]);
let eng_temp=0;
let eng_tt_as=0;//total assignments
let engloa=document.querySelector(".engloa");//(=(totalpoints/total assignment)*3)
let engt=document.querySelector('.engt');//total points of english
let engdes=document.querySelector('.engdes');
let eng_out_100=document.querySelector('.eng_out_of_100');




for(i=0;i<eng_inputs.length;i++){
    eng_temp=eng_temp+Number(eng_inputs[i].value);
    if(Number(eng_inputs[i].value)>0.0){
        eng_tt_as=eng_tt_as+3;
    }
    else{
        console.log("0000");
    }
}

let eng_totalPoints=eng_temp.toFixed(1);
engt.value=eng_totalPoints;





//loa value to give a base on comment
//engdesn(LOA)
let engdesn=((eng_totalPoints/eng_tt_as)*3).toFixed(1);
console.log("llllppppppp"+engdesn);

//avoiding NAN values that may hinder total average of LOA calculation
if(engdesn==0){
    engdesn=0.0;
    engloa.value=" ";
}
else if(isNaN(engdesn)){
    engdesn=0.0;
    engloa.value=" ";
    eng_out_100.value=" ";//formulating the out of 100 section in the 


}
else{
    console.log("oooop");
    engdesn=((eng_totalPoints/eng_tt_as)*3).toFixed(1);
    engloa.value=((eng_totalPoints/eng_tt_as)*3).toFixed(1);
    eng_out_100.value=Math.round((engdesn/3)*100);//formulating the out of 100 section in the 
}


//pendingggggggggggggggggggggggggggggggggggggggggg


let comment=" ";

    if(engdesn<=0){
        engdes.value=" ";

    }
    else if(engdesn>=0.1&&engdesn<=1.4){
        engdes.value="BASIC";

    }
    else if(engdesn>=1.5&&engdesn<=2.4){
        engdes.value="MODERATE";

    }
    else if(engdesn>=2.5&&engdesn<=3.0){
        engdes.value="OUTSTANDING";

    }
    else{
        console.log("something went wrong");
    }



//--------------------------------------------------------------------------------------------------

//total points for Math
let math_loa_label=document.querySelector('.mathloa');
let math_out_of_100=document.querySelector('.math_out_of_100');
console.log("**********"+math_out_of_100);
let math_inputs=document.querySelectorAll('.math');
let math_ttlabel=document.querySelector('.matht');
let math_temp=0;
let math_tt_as=0;//total assignments
let mathcomment=" ";
let mathdes=document.querySelector('.mathdes');

for(i=0;i<math_inputs.length;i++){
    //adding the value from all asignments in a given subject
    math_temp=math_temp+Number(math_inputs[i].value);
        if(Number(math_inputs[i].value)>0.0){
        math_tt_as=math_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("math temp:"+math_temp)
let math_totalPoints=math_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+math_totalPoints)
math_ttlabel.value=math_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//mathdesn =(LOA final value)
let mathdesn=((math_totalPoints/math_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(mathdesn==0){
    mathdesn=0.0;
}
else if(isNaN(mathdesn)){
    mathdesn=0.0;
    math_loa_label.value=" ";
    math_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    math_loa_label.value=mathdesn;
    math_out_of_100.value=Math.round((mathdesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(mathdesn<=0){
        mathdes.value=" ";

    }
    else if(mathdesn>=0.1&&mathdesn<=1.4){
        mathdes.value="BASIC";

    }
    else if(mathdesn>=1.5&&mathdesn<=2.4){
        mathdes.value="MODERATE";

    }
    else if(mathdesn>=2.5&&mathdesn<=3.0){
        mathdes.value="OUTSTANDING";

    }
    else if(mathdesn>3.0){
        mathdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }


//--------------------------------------------------------------------------------------------------

//total points for Hist
let hist_loa_label=document.querySelector('.histloa');
let hist_out_of_100=document.querySelector('.hist_out_of_100');
console.log("**********"+hist_out_of_100);
let hist_inputs=document.querySelectorAll('.hist');
let hist_ttlabel=document.querySelector('.histt');
let hist_temp=0;
let hist_tt_as=0;//total assignments
let histcomment=" ";
let histdes=document.querySelector('.histdes');

for(i=0;i<hist_inputs.length;i++){
    //adding the value from all asignments in a given subject
    hist_temp=hist_temp+Number(hist_inputs[i].value);
        if(Number(hist_inputs[i].value)>0.0){
        hist_tt_as=hist_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("hist temp:"+hist_temp)
let hist_totalPoints=hist_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+hist_totalPoints)
hist_ttlabel.value=hist_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//histdesn =(LOA final value)
let histdesn=((hist_totalPoints/hist_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(histdesn==0){
    histdesn=0.0;
}
else if(isNaN(histdesn)){
    histdesn=0.0;
    hist_loa_label.value=" ";
    hist_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    hist_loa_label.value=histdesn;
    hist_out_of_100.value=Math.round((histdesn/3)*100);//genaratting the out of 100 value
}


//grading basing on the LOA
    if(histdesn<=0){
        histdes.value=" ";

    }
    else if(histdesn>=0.1&&histdesn<=1.4){
        histdes.value="BASIC";

    }
    else if(histdesn>=1.5&&histdesn<=2.4){
        histdes.value="MODERATE";

    }
    else if(histdesn>=2.5&&histdesn<=3.0){
        histdes.value="OUTSTANDING";

    }
    else if(histdesn>3.0){
        histdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Geo
let geo_loa_label=document.querySelector('.geoloa');
let geo_out_of_100=document.querySelector('.geo_out_of_100');
console.log("**********"+geo_out_of_100);
let geo_inputs=document.querySelectorAll('.geo');
let geo_tt_label=document.querySelector('.geot');
let geo_temp=0;
let geo_tt_as=0;//total assignments
let geocomment=" ";
let geodes=document.querySelector('.geodes');

for(i=0;i<geo_inputs.length;i++){
    //adding the value from all asignments in a given subject
    geo_temp=geo_temp+Number(geo_inputs[i].value);
        if(Number(geo_inputs[i].value)>0.0){
        geo_tt_as=geo_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("geo temp:"+geo_temp)
let geo_totalPoints=geo_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+geo_totalPoints)
geo_tt_label.value=geo_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//geodesn =(LOA final value)
let geodesn=((geo_totalPoints/geo_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(geodesn==0){
    geodesn=0.0;
}
else if(isNaN(geodesn)){
    geodesn=0.0;
    geo_loa_label.value=" ";
    geo_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    geo_loa_label.value=geodesn;
    geo_out_of_100.value=Math.round((geodesn/3)*100);//genaratting the out of 100 value
}



//grading basing on the LOA
    if(geodesn<=0){
        geodes.value=" ";

    }
    else if(geodesn>=0.1&&geodesn<=1.4){
        geodes.value="BASIC";

    }
    else if(geodesn>=1.5&&geodesn<=2.4){
        geodes.value="MODERATE";

    }
    else if(geodesn>=2.5&&geodesn<=3.0){
        geodes.value="OUTSTANDING";

    }
    else if(geodesn>3.0){
        geodes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Phy
let phy_loa_label=document.querySelector('.phyloa');
let phy_out_of_100=document.querySelector('.phy_out_of_100');
console.log("**********"+phy_out_of_100);
let phy_inputs=document.querySelectorAll('.phy');
let phy_ttlabel=document.querySelector('.phyt');
let phy_temp=0;
let phy_tt_as=0;//total assignments
let phycomment=" ";
let phydes=document.querySelector('.phydes');

for(i=0;i<phy_inputs.length;i++){
    //adding the value from all asignments in a given subject
    phy_temp=phy_temp+Number(phy_inputs[i].value);
        if(Number(phy_inputs[i].value)>0.0){
        phy_tt_as=phy_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("phy temp:"+phy_temp)
let phy_totalPoints=phy_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+phy_totalPoints)
phy_ttlabel.value=phy_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//phydesn =(LOA final value)
let phydesn=((phy_totalPoints/phy_tt_as)*3).toFixed(1);//LOA value

//avoiding NAN values that may hinder total average of LOA calculation
if(phydesn==0){
    phydesn=0.0;
}
else if(isNaN(phydesn)){
    phydesn=0.0;
    phy_loa_label.value=" ";
    phy_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    phy_loa_label.value=phydesn;
    phy_out_of_100.value=Math.round((phydesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(phydesn<=0){
        phydes.value=" ";

    }
    else if(phydesn>=0.1&&phydesn<=1.4){
        phydes.value="BASIC";

    }
    else if(phydesn>=1.5&&phydesn<=2.4){
        phydes.value="MODERATE";

    }
    else if(phydesn>=2.5&&phydesn<=3.0){
        phydes.value="OUTSTANDING";

    }
    else if(phydesn>3.0){
        phydes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//-------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Chem
let chem_loa_label=document.querySelector('.chemloa');
let chem_out_of_100=document.querySelector('.chem_out_of_100');
console.log("**********"+chem_out_of_100);
let chem_inputs=document.querySelectorAll('.chem');
let chem_ttlabel=document.querySelector('.chemt');
let chem_temp=0;
let chem_tt_as=0;//total assignments
let chemcomment=" ";
let chemdes=document.querySelector('.chemdes');

for(i=0;i<chem_inputs.length;i++){
    //adding the value from all asignments in a given subject
    chem_temp=chem_temp+Number(chem_inputs[i].value);
        if(Number(chem_inputs[i].value)>0.0){
        chem_tt_as=chem_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("chem temp:"+chem_temp)
let chem_totalPoints=chem_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+chem_totalPoints)
chem_ttlabel.value=chem_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//chemdesn =(LOA final value)
let chemdesn=((chem_totalPoints/chem_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(chemdesn==0){
    chemdesn=0.0;
}
else if(isNaN(chemdesn)){
    chemdesn=0.0;
    chem_loa_label.value=" ";
    chem_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    chem_loa_label.value=chemdesn;
    chem_out_of_100.value=Math.round((chemdesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(chemdesn<=0){
        chemdes.value=" ";

    }
    else if(chemdesn>=0.1&&chemdesn<=1.4){
        chemdes.value="BASIC";

    }
    else if(chemdesn>=1.5&&chemdesn<=2.4){
        chemdes.value="MODERATE";

    }
    else if(chemdesn>=2.5&&chemdesn<=3.0){
        chemdes.value="OUTSTANDING";

    }
    else if(chemdesn>3.0){
        chemdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//-----------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Bio
let bio_loa_label=document.querySelector('.bioloa');
let bio_out_of_100=document.querySelector('.bio_out_of_100');
console.log("**********"+bio_out_of_100);
let bio_inputs=document.querySelectorAll('.bio');
let bio_ttlabel=document.querySelector('.biot');
let bio_temp=0;
let bio_tt_as=0;//total assignments
let biocomment=" ";
let biodes=document.querySelector('.biodes');

for(i=0;i<bio_inputs.length;i++){
    //adding the value from all asignments in a given subject
    bio_temp=bio_temp+Number(bio_inputs[i].value);
        if(Number(bio_inputs[i].value)>0.0){
        bio_tt_as=bio_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("bio temp:"+bio_temp)
let bio_totalPoints=bio_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+bio_totalPoints)
bio_ttlabel.value=bio_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//biodesn =(LOA final value)
let biodesn=((bio_totalPoints/bio_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation

if(biodesn==0){
    biodesn=0.0;
}
else if(isNaN(biodesn)){
    biodesn=0.0;
    bio_loa_label.value=" ";
    bio_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    bio_loa_label.value=biodesn;
    bio_out_of_100.value=Math.round((biodesn/3)*100);//genaratting the out of 100 value
}







//grading basing on the LOA
    if(biodesn<=0){
        biodes.value=" ";

    }
    else if(biodesn>=0.1&&biodesn<=1.4){
        biodes.value="BASIC";

    }
    else if(biodesn>=1.5&&biodesn<=2.4){
        biodes.value="MODERATE";

    }
    else if(biodesn>=2.5&&biodesn<=3.0){
        biodes.value="OUTSTANDING";

    }
    else if(biodesn>3.0){
        biodes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Kisw
let kisw_loa_label=document.querySelector('.kiswloa');
let kisw_out_of_100=document.querySelector('.kisw_out_of_100');
console.log("**********"+kisw_out_of_100);
let kisw_inputs=document.querySelectorAll('.kisw');
let kisw_ttlabel=document.querySelector('.kiswt');
let kisw_temp=0;
let kisw_tt_as=0;//total assignments
let kiswcomment=" ";
let kiswdes=document.querySelector('.kiswdes');

for(i=0;i<kisw_inputs.length;i++){
    //adding the value from all asignments in a given subject
    kisw_temp=kisw_temp+Number(kisw_inputs[i].value);
        if(Number(kisw_inputs[i].value)>0.0){
        kisw_tt_as=kisw_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("kisw temp:"+kisw_temp)
let kisw_totalPoints=kisw_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+kisw_totalPoints)
kisw_ttlabel.value=kisw_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//kiswdesn =(LOA final value)
let kiswdesn=((kisw_totalPoints/kisw_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(kiswdesn==0){
    kiswdesn=0.0;
}
else if(isNaN(kiswdesn)){
    kiswdesn=0.0;
    kisw_loa_label.value=" ";
    kisw_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    kisw_loa_label.value=kiswdesn;
    kisw_out_of_100.value=Math.round((kiswdesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(kiswdesn<=0){
        kiswdes.value=" ";

    }
    else if(kiswdesn>=0.1&&kiswdesn<=1.4){
        kiswdes.value="BASIC";

    }
    else if(kiswdesn>=1.5&&kiswdesn<=2.4){
        kiswdes.value="MODERATE";

    }
    else if(kiswdesn>=2.5&&kiswdesn<=3.0){
        kiswdes.value="OUTSTANDING";

    }
    else if(kiswdesn>3.0){
        kiswdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Pe
let pe_loa_label=document.querySelector('.peloa');
let pe_out_of_100=document.querySelector('.pe_out_of_100');
console.log("**********"+pe_out_of_100);
let pe_inputs=document.querySelectorAll('.pe');
let pe_ttlabel=document.querySelector('.pet');
let pe_temp=0;
let pe_tt_as=0;//total assignments
let pecomment=" ";
let pedes=document.querySelector('.pedes');

for(i=0;i<pe_inputs.length;i++){
    //adding the value from all asignments in a given subject
    pe_temp=pe_temp+Number(pe_inputs[i].value);
        if(Number(pe_inputs[i].value)>0.0){
        pe_tt_as=pe_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("pe temp:"+pe_temp)
let pe_totalPoints=pe_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+pe_totalPoints)
pe_ttlabel.value=pe_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//pedesn =(LOA final value)
let pedesn=((pe_totalPoints/pe_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(pedesn==0){
    pedesn=0.0;
}
else if(isNaN(pedesn)){
    pedesn=0.0;
    pe_loa_label.value=" ";
    pe_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    pe_loa_label.value=pedesn;
    pe_out_of_100.value=Math.round((pedesn/3)*100);//genaratting the out of 100 value
}



//grading basing on the LOA
    if(pedesn<=0){
        pedes.value=" ";

    }
    else if(pedesn>=0.1&&pedesn<=1.4){
        pedes.value="BASIC";

    }
    else if(pedesn>=1.5&&pedesn<=2.4){
        pedes.value="MODERATE";

    }
    else if(pedesn>=2.5&&pedesn<=3.0){
        pedes.value="OUTSTANDING";

    }
    else if(pedesn>3.0){
        pedes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Ent
let ent_loa_label=document.querySelector('.entloa');
let ent_out_of_100=document.querySelector('.ent_out_of_100');
console.log("**********"+ent_out_of_100);
let ent_inputs=document.querySelectorAll('.ent');
let ent_ttlabel=document.querySelector('.entt');
let ent_temp=0;
let ent_tt_as=0;//total assignments
let entcomment=" ";
let entdes=document.querySelector('.entdes');

for(i=0;i<ent_inputs.length;i++){
    //adding the value from all asignments in a given subject
    ent_temp=ent_temp+Number(ent_inputs[i].value);
        if(Number(ent_inputs[i].value)>0.0){
        ent_tt_as=ent_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("ent temp:"+ent_temp)
let ent_totalPoints=ent_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+ent_totalPoints)
ent_ttlabel.value=ent_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//entdesn =(LOA final value)
let entdesn=((ent_totalPoints/ent_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(entdesn==0){
    entdesn=0.0;
}
else if(isNaN(entdesn)){
    entdesn=0.0;
    ent_loa_label.value=" ";
    ent_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    ent_loa_label.value=entdesn;
    ent_out_of_100.value=Math.round((entdesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(entdesn<=0){
        entdes.value=" ";

    }
    else if(entdesn>=0.1&&entdesn<=1.4){
        entdes.value="BASIC";

    }
    else if(entdesn>=1.5&&entdesn<=2.4){
        entdes.value="MODERATE";

    }
    else if(entdesn>=2.5&&entdesn<=3.0){
        entdes.value="OUTSTANDING";

    }
    else if(entdesn>3.0){
        entdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Re
let re_loa_label=document.querySelector('.reloa');
let re_out_of_100=document.querySelector('.re_out_of_100');
console.log("**********"+re_out_of_100);
let re_inputs=document.querySelectorAll('.re');
let re_ttlabel=document.querySelector('.ret');
let re_temp=0;
let re_tt_as=0;//total assignments
let recomment=" ";
let redes=document.querySelector('.redes');

for(i=0;i<re_inputs.length;i++){
    //adding the value from all asignments in a given subject
    re_temp=re_temp+Number(re_inputs[i].value);
        if(Number(re_inputs[i].value)>0.0){
        re_tt_as=re_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("re temp:"+re_temp)
let re_totalPoints=re_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+re_totalPoints)
re_ttlabel.value=re_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//redesn =(LOA final value)
let redesn=((re_totalPoints/re_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(redesn==0){
    redesn=0.0;
}
else if(isNaN(redesn)){
    redesn=0.0;
    re_loa_label.value=" ";
    re_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    re_loa_label.value=redesn;
    re_out_of_100.value=Math.round((redesn/3)*100);//genaratting the out of 100 value
}



//grading basing on the LOA
    if(redesn<=0){
        redes.value=" ";

    }
    else if(redesn>=0.1&&redesn<=1.4){
        redes.value="BASIC";

    }
    else if(redesn>=1.5&&redesn<=2.4){
        redes.value="MODERATE";

    }
    else if(redesn>=2.5&&redesn<=3.0){
        redes.value="OUTSTANDING";

    }
    else if(redesn>3.0){
        redes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//---------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Fart
let fart_loa_label=document.querySelector('.fartloa');
let fart_out_of_100=document.querySelector('.fart_out_of_100');
console.log("**********"+fart_out_of_100);
let fart_inputs=document.querySelectorAll('.fart');
let fart_ttlabel=document.querySelector('.fartt');
let fart_temp=0;
let fart_tt_as=0;//total assignments
let fartcomment=" ";
let fartdes=document.querySelector('.fartdes');

for(i=0;i<fart_inputs.length;i++){
    //adding the value from all asignments in a given subject
    fart_temp=fart_temp+Number(fart_inputs[i].value);
        if(Number(fart_inputs[i].value)>0.0){
        fart_tt_as=fart_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("fart temp:"+fart_temp)
let fart_totalPoints=fart_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+fart_totalPoints)
fart_ttlabel.value=fart_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//fartdesn =(LOA final value)
let fartdesn=((fart_totalPoints/fart_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(fartdesn==0){
    fartdesn=0.0;
}
else if(isNaN(fartdesn)){
    fartdesn=0.0;
    fart_loa_label.value=" ";
    fart_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    fart_loa_label.value=fartdesn;
    fart_out_of_100.value=Math.round((fartdesn/3)*100);//genaratting the out of 100 value
}




//grading basing on the LOA
    if(fartdesn<=0){
        fartdes.value=" ";

    }
    else if(fartdesn>=0.1&&fartdesn<=1.4){
        fartdes.value="BASIC";

    }
    else if(fartdesn>=1.5&&fartdesn<=2.4){
        fartdes.value="MODERATE";

    }
    else if(fartdesn>=2.5&&fartdesn<=3.0){
        fartdes.value="OUTSTANDING";

    }
    else if(fartdesn>3.0){
        fartdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Ict
let ict_loa_label=document.querySelector('.ictloa');
let ict_out_of_100=document.querySelector('.ict_out_of_100');
console.log("**********"+ict_out_of_100);
let ict_inputs=document.querySelectorAll('.ict');
let ict_ttlabel=document.querySelector('.ictt');
let ict_temp=0;
let ict_tt_as=0;//total assignments
let ictcomment=" ";
let ictdes=document.querySelector('.ictdes');

for(i=0;i<ict_inputs.length;i++){
    //adding the value from all asignments in a given subject
    ict_temp=ict_temp+Number(ict_inputs[i].value);
        if(Number(ict_inputs[i].value)>0.0){
        ict_tt_as=ict_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("ict temp:"+ict_temp)
let ict_totalPoints=ict_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+ict_totalPoints)
ict_ttlabel.value=ict_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//ictdesn =(LOA final value)
let ictdesn=((ict_totalPoints/ict_tt_as)*3).toFixed(1);//LOA value


ict_out_of_100.value=Math.round((ictdesn/3)*100);//genaratting the out of 100 value
ict_loa_label.value=ictdesn;
//avoiding NAN values that may hinder total average of LOA calculation
//avoiding NAN values that may hinder total average of LOA calculation
if(ictdesn==0){
    ictdesn=0.0;
}
else if(isNaN(ictdesn)){
    ictdesn=0.0;
    ict_loa_label.value=" ";
    ict_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    ict_loa_label.value=ictdesn;
    ict_out_of_100.value=Math.round((ictdesn/3)*100);//genaratting the out of 100 value
}



//grading basing on the LOA
    if(ictdesn<=0){
        ictdes.value=" ";

    }
    else if(ictdesn>=0.1&&ictdesn<=1.4){
        ictdes.value="BASIC";

    }
    else if(ictdesn>=1.5&&ictdesn<=2.4){
        ictdes.value="MODERATE";

    }
    else if(ictdesn>=2.5&&ictdesn<=3.0){
        ictdes.value="OUTSTANDING";

    }
    else if(ictdesn>3.0){
        ictdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//---------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Lit
let lit_loa_label=document.querySelector('.litloa');
let lit_out_of_100=document.querySelector('.lit_out_of_100');
console.log("**********"+lit_out_of_100);
let lit_inputs=document.querySelectorAll('.lit');
let lit_ttlabel=document.querySelector('.litt');
let lit_temp=0;
let lit_tt_as=0;//total assignments
let litcomment=" ";
let litdes=document.querySelector('.litdes');

for(i=0;i<lit_inputs.length;i++){
    //adding the value from all asignments in a given subject
    lit_temp=lit_temp+Number(lit_inputs[i].value);
        if(Number(lit_inputs[i].value)>0.0){
        lit_tt_as=lit_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("lit temp:"+lit_temp)
let lit_totalPoints=lit_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+lit_totalPoints)
lit_ttlabel.value=lit_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//litdesn =(LOA final value)
let litdesn=((lit_totalPoints/lit_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(litdesn==0){
    litdesn=0.0;
}
else if(isNaN(litdesn)){
    litdesn=0.0;
    lit_loa_label.value=" ";
    lit_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    lit_loa_label.value=litdesn;
    lit_out_of_100.value=Math.round((litdesn/3)*100);//genaratting the out of 100 value
}






//grading basing on the LOA
    if(litdesn<=0){
        litdes.value=" ";

    }
    else if(litdesn>=0.1&&litdesn<=1.4){
        litdes.value="BASIC";

    }
    else if(litdesn>=1.5&&litdesn<=2.4){
        litdes.value="MODERATE";

    }
    else if(litdesn>=2.5&&litdesn<=3.0){
        litdes.value="OUTSTANDING";

    }
    else if(litdesn>3.0){
        litdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

//total points for Lug
let lug_loa_label=document.querySelector('.lugloa');
let lug_out_of_100=document.querySelector('.lug_out_of_100');
console.log("**********"+lug_out_of_100);
let lug_inputs=document.querySelectorAll('.lug');
let lug_tt_label=document.querySelector('.lugt');
let lug_temp=0;
let lug_tt_as=0;//total assignments
let lugcomment=" ";
let lugdes=document.querySelector('.lugdes');

for(i=0;i<lug_inputs.length;i++){
    //adding the value from all asignments in a given subject
    lug_temp=lug_temp+Number(lug_inputs[i].value);
        if(Number(lug_inputs[i].value)>0.0){
        lug_tt_as=lug_tt_as+3;//finding the number of assignments done(@assignment=3)
    }
    else{
        console.log("0000");
    }
}
console.log("lug temp:"+lug_temp)
let lug_totalPoints=lug_temp.toFixed(1);//total points of assignments
console.log("opppppppp"+lug_totalPoints)
lug_tt_label.value=lug_totalPoints;//assigning total points to total points label in the table

//loa value to give a base on comment
//lugdesn =(LOA final value)
let lugdesn=((lug_totalPoints/lug_tt_as)*3).toFixed(1);//LOA value
//avoiding NAN values that may hinder total average of LOA calculation
if(lugdesn==0){
    lugdesn=0.0;
}
else if(isNaN(lugdesn)){
    lugdesn=0.0;
    lug_loa_label.value=" ";
    lug_out_of_100.value=" ";//genaratting the out of 100 value

}
else{
    console.log("oooop")
    lug_loa_label.value=lugdesn;
    lug_out_of_100.value=Math.round((lugdesn/3)*100);//genaratting the out of 100 value
}






//grading basing on the LOA
    if(lugdesn<=0){
        lugdes.value=" ";

    }
    else if(lugdesn>=0.1&&lugdesn<=1.4){
        lugdes.value="BASIC";

    }
    else if(lugdesn>=1.5&&lugdesn<=2.4){
        lugdes.value="MODERATE";

    }
    else if(lugdesn>=2.5&&lugdesn<=3.0){
        lugdes.value="OUTSTANDING";

    }
    else if(lugdesn>3.0){
        lugdes.value="ERROR";
    }
    else{
        console.log("something went wrong");
    }

//---------------------------------------------------------------------------------------------
//CALCULATING THE TOTAL AVERAGE
//++++formula=sum(loa)/number of students

//Finding the total number of subjects done by a given student**********************

let num_of_stud_pick=document.querySelectorAll('.loa');
console.log(num_of_stud_pick);
let num_of_stud_temp=0;
let final_num_of_stud=0


for(i=0;i<num_of_stud_pick.length;i++){
    //adding the value from all asignments in a given subject
    num_of_stud_temp=num_of_stud_temp+Number(num_of_stud_pick[i].value);
        if(Number(num_of_stud_pick[i].value)>0.0){
        final_num_of_stud=final_num_of_stud+1;//finding the number of assignments done(@assignment=1 when finding the number  of  students and looping through) 
    }
    else{
        console.log("0000");
    }
}
console.log("number of subjects done by a student: "+final_num_of_stud);
//find the summation of LOA****************************************
let sum_of_loa=(Number(engdesn)+Number(mathdesn)+Number(histdesn)+Number(geodesn)+Number(phydesn)+Number(chemdesn)+Number(biodesn)+Number(kiswdesn)+Number(pedesn)+Number(entdesn)+Number(redesn)+Number(fartdesn)+Number(lugdesn)+Number(litdesn)+(ictdesn));


//++++formula=sum(loa)/number of students
//final calculation and excution of the formula
let total_average=((sum_of_loa)/final_num_of_stud).toFixed(1);
console.log("final total average: "+total_average);





//picking up the label 
let total_grade_l=document.querySelector('#total_grade_l');
console.log("total_grade: "+total_grade_l);
//working on comments

let total_average_comment;
if(total_average<=0){
    total_average_comment=" ";

}
else if(total_average>=0.1&&total_average<=1.4){
    total_average_comment="BASIC";

}
else if(total_average>=1.5&&total_average<=2.4){
    total_average_comment="MODERATE";

}
else if(total_average>=2.5&&total_average<=3.0){
    total_average_comment="OUTSTANDING";

}
else if(total_average>3.0){
    total_average_comment="ERROR";
}
else{
    console.log("something went wrong");
}

//sending the total average to innerHtml
console.log(total_average_comment);
total_grade_l.innerHTML=(total_average)+"="+total_average_comment;
}




//ENG OF GRADING FUCTION====================================================================


//errors to debug and work to do
//loop through loa inputs to fint the to number of items refer to the formula

//























let save_button_count=0;
//============MOUSE Events over sending buttons====================================================
save_button.addEventListener("click",()=>{
    grade();
    console.log("clicked")
    save_button.style.background="#2f2e2e"
    save_button.style.color="#eff5fb"
    save_button.style.borderColor="white"
    save_button.style.height="60px"
    console.log(save_button)
})

save_button.addEventListener("click",()=>{
    save_button_count+=1
    if (save_button_count===1){
        next_button.style.background="2f2e2e"
        next_button.style.visibility="visible"
    }
    else{
       console.log("SENT")
    }
    save_button.style.background="#2f2e2e"
    save_button.style.color="#eff5fb"
    save_button.style.borderColor="white"
    console.log(save_button)
    console.log(save_button_count)
})





save_button.addEventListener("mouseleave",()=>{

    save_button.style.background="white"
    save_button.style.color="black"
    save_button.style.borderColor="blue"
    save_button.style.width="90px"
    save_button.style.height="50px"
})


next_button.addEventListener("click",()=>{
    next_button.visibility="hidden"
    console.log("delldl")
})

let form1=document.querySelector('#form1');
document.querySelector('#clear').addEventListener('click',()=>{
form1.reset();
})
