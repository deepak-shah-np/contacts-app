
$('.download-vcf').on('click',function () {
   var contactData = vCard(contactDetail);
    download(contactDetail['name']+".vcf",contactData);



});
$('.download-all').on('click',function () {
    var data = '';
    $.each(allContacts,function (key,value) {
        data += vCard(value);
    });

    download('export.vcf',data);
})

function vCard(contact) {
    var start = "BEGIN:VCARD\nVERSION:3.0";
    var end = "END:VCARD";
    var data = "";
    data +=start+"\n";
    data += "N;CHARSET=utf-8:"+contact['name']+";\n";
    data += "EMAIL;INTERNET:"+contact['email']+";\n";
    data += "TEL:"+contact['phone']+"\n";
    data += "ADR;CHARSET=utf-8:"+contact['address']+";\n";
    data += "ORG;CHARSET=utf-8:"+contact['company']+"\n";
    data += "BDAY:"+contact['birth_date']+"\n";
    data += end+"\n";

    return data;
}


function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/vcard;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}




