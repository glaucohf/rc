<?php
//bkp do dia 20200122
//date_default_timezone_set('America/Sao_Paulo'); //Com horário de verão
date_default_timezone_set('America/Recife'); //Sem horário de verão
$sendEmail = false;
$sendLeadLovers = true;
$sendLeadAgendor = true;
$sendExternalAgendor = false;
$sendHotzapp = false;
$sendDB = true;
$insideTheLimit = true;
$checkMandatoryPhone = true;
$countAlreadyRegistredLead = true; //Contabilizar usuário já registrado

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$interest = $_POST['interest'];
$url = $_SERVER['HTTP_REFERER'];
$ip = $_SERVER["REMOTE_ADDR"];
$formNumber = $_POST['formNumber'];

$destino = $_POST['destino'];

$sendWhatsappOption = $_POST['whatsapp_updates'];
$whatsappUrl = '?whatsUrl=http://whats.club/?wr=F27D395B';
$consulting = 100001; // Lançamento

$defaultConsulting = 262497; //Rio coaching
$externalConsulting = 428866; //Concretize

//hotzapp configs
$urlHotzappPrefix = "https://hotzapp.me/api/pbl/?u=5c82cde480caee271071435c&k=ZnsUnMobeB1Dh49&s=";
$urlHotzappSufix = "OUTROS";
$hotzappProduct = "EC - POA";

$category = 1268295;
$gotopay = 0;
$scheduled_attendance = 1;
$firstTimeLead=1; //Primeira vez que o lead se aplica
$restarted_roundrobin = false;

if ($interest == ""){
	$name = $_POST['llfield3519'];
	$phone = $_POST['llfield3521'];
	$email = $_POST['llfield3520'];
	$interest = $_POST['llfield9096']; // Lead from Rio Coaching (dinamic form )
}
if ($url == ""){
	$url = $_POST['url'];
	$ip = $_POST["ip"];
}

$observation = sprintf ( "Formulário: %s \n Origem do Lead: \n %s", $formNumber, $url);

//Some validations
if ($checkMandatoryPhone == true and $phone == "" or $url =="https://riocoaching.com.br/distribuidor/distribuidor.php"){
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	goto end;
}


switch ($interest) {
case "Kids":
case "Kids - contato": //from icij
case "Kids-pay":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/104792';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '104792';
    $pid = '3319563';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "KC";
	$hotzappProduct = "KC#20";
	break;
case "KCP":
case "KCP-pay":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial/mensagem-enviada';
	$id = '195293';
    $pid = '7058771';
	$leadOrigins = 1030466;
	$products = "[318550]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "KCP";
	$hotzappProduct = "KCP-RJ";
	break;
case "KCP-RJ":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-rj/mensagem-enviada';
	$id = '195293';
    $pid = '7483817';
	$leadOrigins = 1030466;
	$products = "[325440]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "KCP";
	$hotzappProduct = "KCP-RJ";
	break;
case "KCP-SP":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-sp/mensagem-enviada';
	$id = '195293';
    $pid = '7483818';
	$leadOrigins = 1030466;
	$products = "[325441]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-BH":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-bh/mensagem-enviada';
	$id = '195293';
    $pid = '7483816';
	$leadOrigins = 1030466;
	$products = "[325442]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Belem":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-belem/mensagem-enviada';
	$id = '195293';
    $pid = '7483821';
	$leadOrigins = 1030466;
	$products = "[325443]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-PT":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-pt/mensagem-enviada';
	$id = '195293';
    $pid = '7934135';
	$leadOrigins = 1030466;
	$products = "[333134]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Brasilia":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-brasilia/mensagem-enviada';
	$id = '195293';
    $pid = '8921539';
	$leadOrigins = 1030466;
	$products = "[349235]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Recife":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKCPrecife.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-recife/mensagem-enviada';
	$id = '195293';
    $pid = '8921543';
	$leadOrigins = 1030466;
	$products = "[349237]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = false;
	$sendEmail = true;
	break;
case "KCP-Recife-ICIJ":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-recife/mensagem-enviada';
	$id = '195293';
    $pid = '8921543';
	$leadOrigins = 1030466;
	$products = "[349237]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	$sendEmail = true;
	break;
case "KCP-Curitiba":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-curitiba/mensagem-enviada';
	$id = '195293';
    $pid = '8921546';
	$leadOrigins = 1030466;
	$products = "[349236]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Floripa":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-floripa/mensagem-enviada';
	$id = '195293';
    $pid = '9315003';
	$leadOrigins = 1030466;
	$products = "[356099]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-POA":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-porto-alegre/mensagem-enviada';
	$id = '195293';
    $pid = '9315027';
	$leadOrigins = 1030466;
	$products = "[356100]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Uberlandia":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-uberlandia/mensagem-enviada';
	$id = '195293';
    $pid = '10731017';
	$leadOrigins = 1030466;
	$products = "[382296]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-CaxiasdoSul":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-caxiasdosul/mensagem-enviada';
	$id = '195293';
    $pid = '10731499';
	$leadOrigins = 1030466;
	$products = "[382297]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Campinas":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-campinas/mensagem-enviada';
	$id = '195293';
    $pid = '12844978';
	$leadOrigins = 1030466;
	$products = "[415784]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Salvador":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-salvador/mensagem-enviada';
	$id = '195293';
    $pid = '13138607';
	$leadOrigins = 1030466;
	$products = "[416913]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "KCP-Goiania":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-goiania/mensagem-enviada';
	$id = '195293';
    $pid = '13138652';
	$leadOrigins = 1030466;
	$products = "[416914]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "Teen":
case "Teen - contato":
case "Teen-pay":
	$mailUrl= 'http://riocoaching.com.br/distribuidor/enviaremailTC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/156625';
	$thanksUrl = 'Location: https://teencoaching.com.br/mensagem-enviada';
    $id = '142627';
    $pid = '4291968';
	$leadOrigins = 1030465;
	$products = "[222988]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "TC";
	$hotzappProduct = "TCP#15";
	break;
case "icij":
case "icij-pay":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/106619';
	$thanksUrl = 'Location: https://coachinginfantojuvenil.com.br/mensagem-enviada/';
	$id = '106619';
    $pid = '775';
	$leadOrigins = 1057016;
	$products = "[418903]";
	$consultingTable = 2;
	$dinamicForm = true;
	break;
case "TC-P.Orientada":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=le58ewpe';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339136]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Jornada":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=3my94wts';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339139]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Destrave":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=14zfhilr';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339141]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Intensamente":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=pypa1px8';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339142]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "KC-Familiar":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=xl0xf0pj';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339143]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "KC-Escolar":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=qqkd34we';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339144]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Emotional Coaching":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=ojrqolsd';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339145]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "Mais Tempo":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=ojrqolsd';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339145]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Positivamente":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=4vvth5l0';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339146]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "Prospere":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/199932';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P?off=4vvth5l0';
	$id = '199932';
    $pid = '7278424';
	$leadOrigins = 1125376;
	$products = "[334640]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "PASSE-LIVRE":
case "Passe-Livre":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/P10423591P';
	$id = '119021';
    $pid = '3460515';
	$leadOrigins = 1125376;
	$products = "[339146]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "TG-lancamento":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://transformogeracoes.com.br/desenvolvimento-humano-tg4';
    $whatsappUrl = '?whatsUrl=https://whats.club/?wr=5E6F26D3';
	$id = '119021';
    $pid = '9217638';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$consultingTable = 1;
	$dinamicForm = false;
	$sendLeadAgendor = false;
	break;
case "TG-2020":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/X12973548M?off=t5fkwudb';
    //$whatsappUrl = '?whatsUrl=https://whats.club/?wr=5E6F26D3';
	$id = '119021';
    $pid = '9217638';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$consultingTable = 1;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	break;
case "TG-Hotmart":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/H7721969G?off=baecsph5';
	$id = '119021';
    $pid = '9217730';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$consultingTable = 1;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	$sendWhatsappOption = "";
	break;
case "TG":
case "tg":
case "tg-pay":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://pay.hotmart.com/H7721969G?off=dypmv42e';
	$id = '119021';
    $pid = '3426935';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "mb": //TODO Ajustar os valores
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://coachinginfantojuvenil.com.br/mensagem-enviada-tg/';
	$id = '119021';
    $pid = '3426935';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$consultingTable = 1;
	$dinamicForm = false;
	break;
case "+HC":
case "+HC-pay":
case "Mais Humor":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1030438;
	$products = "[246149]";
	$consultingTable = 1;
	$dinamicForm = true;
	break;
case "BC":
case "BC-pay":
case "Tornado":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1032227;
	$products = "[255406]";
	$consultingTable = 3;
	$dinamicForm = true;
	break;
case "FSP":
case "FSP-pay":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1032226;
	$products = "[318505]";
	$consultingTable = 1;
	$dinamicForm = true;
	break;
case "KC-Passa": //aulas do passariano
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://kidscoaching.com.br/oportunidade-curso/';
	$id = '151488';
    $pid = '7814838';
	$leadOrigins = 1077609;
	$products = "[331997]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
case "TC-Passa": //aulas do passariano tc
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://teencoaching.com.br/oportunidade-curso/';
	$id = '156625';
    $pid = '8045275';
	$leadOrigins = 1098684;
	$products = "[338446]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
 case "kc-ppl": //kc ppl1 e 2
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://kidscoaching.com.br/embreve';
	$id = '151488';
    $pid = '4785273';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = false;
	$consulting = 100002;
	break;
 case "Lista Preferencial": //kc ppl 3
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: http://kidscoaching.com.br/lista-preferencial/obrigado';
	$id = '151488';
    $pid = '4804360';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = false;
	break;
 case "kc-cpl4":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://pay.hotmart.com/N4260373R?off=tco7gczk';
	$id = '151488';
    $pid = '4785274';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	$sendWhatsappOption = "";
	break;
 case "tc-ppl": //tc ppl1 e 2
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/156625';
	$thanksUrl = 'Location: https://teencoaching.com.br/embreve';
	$id = '156625';
    $pid = '5088844';
	$leadOrigins = 1030465;
	$products = "[222988]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = false;
	$consulting = 100003;
	break;
case "tc-cpl4": //comprar curso da aula 4 teen
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/156625';
	$thanksUrl = 'Location: https://pay.hotmart.com/I6182577C';
	$id = '156625';
    $pid = '8045007';
	$leadOrigins = 1030465;
	$products = "[222988]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	$sendWhatsappOption = "";
	break;
case "doterra":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/329770';
	$thanksUrl = 'Location: https://doterranasuavida.com.br/homepage/obrigado/';
    $whatsappUrl = '?whatsUrl=https://whats.club/?wr=5E6F26D3';
	$id = '329770';
    $pid = '12441137';
	$leadOrigins = 1327524;
	$products = "[412571]";
	$consultingTable = 4;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	break;
case "Kids-blackfriday":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/104792';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '104792';
    $pid = '12591107';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "KC";
	$hotzappProduct = "KC#20";
	break;
case "Teen-blackfriday":
	$mailUrl= 'http://riocoaching.com.br/distribuidor/enviaremailTC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/156625';
	$thanksUrl = 'Location: https://teencoaching.com.br/mensagem-enviada';
    $id = '142627';
    $pid = '12591260';
	$leadOrigins = 1030465;
	$products = "[222988]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendHotzapp = false;
	$urlHotzappSufix = "TC";
	$hotzappProduct = "TCP#15";
	break;
case "Expo-BH": //exponential coaching
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/209536';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching-bh/mensagem-enviada-bh/';
	$id = '209536';
    $pid = '7696710';
	$leadOrigins = 1115185;
	$products = "[343388]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = true;
	$concretizeUrl = 'http://riocoaching.com.br/distribuidor/concretize.php';
	$sendWhatsappOption = "";
	break;
case "Expo-Portugal":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/209536';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching-bh/mensagem-enviada-bh/';
	$id = '209536';
    $pid = '7696710';
	$leadOrigins = 1115185;
	$products = "[343388]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = true;
	$concretizeUrl = 'http://riocoaching.com.br/distribuidor/concretize.php';
	$sendWhatsappOption = "";
	break;
case "Expo-SP": //exponential coaching
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/209536';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching-sp/mensagem-enviada-sp/';
	$id = '209536';
    $pid = '8587389';
	$leadOrigins = 1115187;
	$products = "[343390]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = true;
	$concretizeUrl = 'http://riocoaching.com.br/distribuidor/concretize.php';
	$sendWhatsappOption = "";
	break;
case "Expo-RJ": //exponential coaching
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/209536';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching-rj/mensagem-enviada-rj/';
	$id = '209536';
    $pid = '8587371';
	$leadOrigins = 1115186;
	$products = "[343389]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = true;
	$concretizeUrl = 'http://riocoaching.com.br/distribuidor/concretize.php';
	$sendWhatsappOption = "";
	break;
case "Expo": //exponential coaching geral
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/209536';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching/mensagem-enviada/';
	$id = '209536';
    $pid = '7696710';
	$leadOrigins = 1115186;
	$products = "[343389]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = false;
	$sendWhatsappOption = "";
	break;
case "Trainers":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailExpo.php';
	$leadloversUrl = 'https://paginas.rocks/Pages/Index/233372';
	$thanksUrl = 'Location: https://riocoaching.com.br/exponential-coaching/mensagem-enviada/';
	$id = '233372';
    $pid = '8630136';
	$leadOrigins = 655473;
	$products = "[303327]";
	$consultingTable = 2;
	$dinamicForm = false;
	$sendEmail = false;
	$sendLeadAgendor = true;
	$sendLeadLovers = true;
	$sendConcretize = false;
	$sendWhatsappOption = "";
	break;
case "HSEmocionais":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/106619';
	$thanksUrl = 'Location: https://institutoinfantojuvenil.com.br/hse/obrigado';
	$id = '106619';
    $pid = '12846493';
	$leadOrigins = 1057016;
	$products = "[415592]";
	$consultingTable = 1;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	break;
case "Cont.Historia":
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/contacao-de-historias/mensagem-enviada';
	$id = '56451';
    $pid = '12557861';
	$leadOrigins = 1057016;
	$products = "[418891]";
	$consultingTable = 1;
	$dinamicForm = false;
	$sendLeadAgendor = true;
	break;
case "Profiler":
	break;
case "Reingresso":
	break;
case "Encontro":
	break;
default: //same as kids
	$interest = "sem-interest";
	$mailUrl = 'http://riocoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/104792';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '104792';
    $pid = '3319563';
	$products = "[223809]";
	$consultingTable = 2;
	$dinamicForm = false;
	break;
}


if(!empty($destino)){
    if($destino=='hunter'){
        $thanksUrl = 'Location: https://riocoaching.com.br/lead-cadastrado/';
        $leadOrigins = 1132079;
    }
    else if($destino=='mkt'){
        $thanksUrl = 'Location: https://riocoaching.com.br/cadastrar-lead-mkt?st=1';
        $leadOrigins = 1132079;
    }
    else{
        $thanksUrl = 'Location: https://riocoaching.com.br/lead-cadastrado/';
        $leadOrigins = 1132079;
    }

}

//BEGIN EMAIL
// set post fields to email
if ($sendEmail){
	$post = [
		'name' => $_POST['name'],
		'message' => $_POST['message'],
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],
		'ads' => $_POST['ads'],
		'utm_data' => $_COOKIE['_ao5_track_mensagem'],
		'ip' => $_SERVER["REMOTE_ADDR"]
	];

	$ch = curl_init($mailUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

	// execute!
	$response = curl_exec($ch);

	// close the connection, release resources used
	curl_close($ch);

	// log do envio de email
	$msg2log = sprintf(  "Envio de email: Nome: %s , email: %s , telefone: %s " , $name, $email, $phone );
	logMsg( $msg2log );
	logMsg($response);
}

//BEGIN LEADLOVERS
// set post fields to leadlovers
if ($sendLeadLovers){
	if ($dinamicForm == true){
		logMsg( DINAMICO );
		// set post fields dinamic form
		$post = [
			'mid' => $id,
			'fid' => $pid,
			'list_id' => $list_id,
			'provider' => 'leadlovers',
			'source' => $_COOKIE['_ao5_track_mensagem'],
			'llfield3519' => $name,
			'llfield3521' => $phone,
			'llfield3520' => $email,
			'llfield9096' => $interest
		];
	}
	else{
		logMsg( ESTATICO);
		// set post fields static form
		$post = [
			'id' => $id,
			'pid' => $pid,
			'list_id' => $id,
			'provider' => 'leadlovers',
			// 'source' => $_GET['utm_source'],
			//'source' => $_COOKIE['_ao5_track_mensagem'],
			'name' => $name,
			'phone' => $phone,
			'email' => $email
		];
	}


	$ch = curl_init($leadloversUrl); //mudar
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

	// execute!
	$responseLL = curl_exec($ch);

	// close the connection, release resources used
	curl_close($ch);

	// log leadlovers
	$msg2log = sprintf(  "Envio para leadlovers realizado com sucesso! Nome: %s , email: %s , telefone: %s, URL: %s " , $name, $email, $phone, $leadloversUrl );
	logMsg( $msg2log );
	logMsg($responseLL);
}

//BEGIN AGENDOR
$responseAgTarefa=true;
if ($sendLeadAgendor){


	// Se já tiver um consultor cadastrado, e ele estiver ativo, continua com ele, senão seleciona um novo
	$consulting = getActualConsulting($email);
	$msg2log = sprintf(  "Consultor encontrado: %s " , $consulting);
	logMsg( $msg2log );
	if ($consulting != ""){
		$firstTimeLead = 0;
		$isActiveConsulting = isActiveConsulting($consulting);
		$msg2log = sprintf(  "Consultor ativo: %s " , $isActiveConsulting);
		logMsg( $msg2log );
	}
	$reapply = 0;


	if ($isActiveConsulting!=1 or $consulting == ""){
		$day = date('d');
		$isPriority = isPriorityInterest($interest);
		$msg2log = sprintf(  "Interest prioritário: %s", $isPriority );
		logMsg( $msg2log );
		$lastConsulting = getLastConsulting($isPriority);
		$msg2log = sprintf(  "Último Consultor: %s", $lastConsulting );
		logMsg( $msg2log );
		$consulting = getNextConsulting ($consultingTable, $lastConsulting, $isPriority, $day);
		$msg2log = sprintf(  "Próximo Consultor: %s", $consulting );
		logMsg( $msg2log );
		updateLastConsulting($isPriority, $consulting, $reapply);
		updateConsulting($isPriority, $consulting);

	}
	//Vai manter o mesmo consultor
	else{
		if ($countAlreadyRegistredLead){
			$reapply = 1;
			updateLastConsulting($isPriority, $consulting, $reapply);
			updateConsulting($isPriority, $consulting);
			$msg2log = sprintf(  "Contabilizando lead que está reaplicando para consultor: %s", $consulting );
			logMsg( $msg2log );
		}
	}

	$msg2log = sprintf(  "Codigo do consultor alocado: %s", $consulting );
	logMsg( $msg2log );


	//Se já tiver um consultor e não é a externalAgendor é pq já existia na base da Rio Coaching portanto não deve ir para a externalAgendor. Se ele está no usuário externalAgendor então ele pode ir novamente para o agendor da ExternalAgendor
	if ($consulting != "" and $consulting != $externalConsulting){
		$sendExternalAgendor = false;
	}
	else {
		$sendExternalAgendor = true;
		// Se utrapassar o limite diário, irá lançar na lista de consultores sobressalentes, cada tabela tem a sua sobressalente, senão faz o roundrobin pelos consultores
		$consulting = $defaultConsulting;
	}




	$curl = curl_init();

	$fieldsLead = "{
		\"name\": \"$name\",
		\"ownerUser\":  $consulting,
		\"description\": \"$observation\",
		\"category\": 1268295,
		\"products\": $products,
		\"leadOrigin\": $leadOrigins,
		\"contact\": { \"email\": \"$email\",
		\"whatsapp\": \"$phone\"}}";

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.agendor.com.br/v3/people/upsert",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $fieldsLead,
	  CURLOPT_HTTPHEADER => array(
		"Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8",
		"Cache-Control: no-cache",
		"Content-Type: application/json",
		"Postman-Token: 15af1f1f-a8a6-97b5-4a56-c78e7170ed8d"
	  ),
	));
	$responseAg = curl_exec($curl);
	$err = curl_error($curl);
	$obj = json_decode($responseAg);

	$client = $obj->{'data'}->{'id'};

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	  logMsg( $err );
	} else {
	//  echo $responseAg;
	}

	// Agendor log - Creating Lead
	$msg2log = sprintf(  "Envio para Agendor (criação do Lead): Nome: %s, email: %s, telefone: %s, consultor: %s, interesse: %s, IP: %s, Enviar por Whatsapp: %s", $name, $email, $phone, $consulting, $interest, $ip, $sendWhatsappOption );
	logMsg( $msg2log );
	logMsg( $fieldsLead );
	logMsg( $responseAg );

	$date = date('Y-m-d\TH:i:s');

	// Task creation
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v1/tasks");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);

	curl_setopt($ch, CURLOPT_POST, TRUE);

	$fieldsTask="{
		 \"person\":  $client,
		\"text\": \"Entrar em contato.\",
		\"dueDate\": \" $date \",
		\"assignedUsers\": [$consulting]
	}";

	curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsTask);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  "Content-Type: application/json", "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8"
	));

	$responseAgTarefa = curl_exec($ch);

	curl_close($ch);

	// Agendor log - Creating Task
	$msg2log = sprintf(  "Envio para Agendor (criação da tarefa): Nome: %s, email: %s, telefone: %s, consultor: %s, código do cliente: %s ", $name, $email, $phone, $consulting, $client );
	logMsg( $msg2log );
	logMsg( $fieldsTask );
	logMsg( $responseAgTarefa );

}


//	 BEGIN HOTZAPP
// set post fields to Hotzapp
if ($sendHotzapp){

	$urlHotzapp = $urlHotzappPrefix.$urlHotzappSufix;
	//inicio envio via json
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $urlHotzapp);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);

	curl_setopt($ch, CURLOPT_POST, TRUE);

	$fieldsTask="{
		 \"nome\":  \" $name \",
		\"telefone\": \" $phone \",
		\"email\": \" $email \",
		\"produto\": \" $hotzappProduct \"
	}";

	curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsTask);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  "Content-Type: application/json"
	));

	$responseHotzapp = curl_exec($ch);

	curl_close($ch);

	// log do envio para hotzapp
	$msg2log = sprintf(  "Envio para hotzapp: Nome: %s , email: %s , telefone: %s , produto: %s " , $name, $email, $phone, $hotzappProduct );
	logMsg( $msg2log );
	logMsg($responseHotzapp);

}

//BEGIN EXTERNAL AGENDOR
// set post fields to email
if ($sendExternalAgendor){
	if ($insideTheLimit){

		$post = [
			'name' => $name,
			'phone' => $phone ,
			'email' => $email,
			'interest' => $interest,
			'url' => $url,
			'ip' => $ip,
			'sendWhatsappOption' => $sendWhatsappOption
		];

		$ch = curl_init($externalAgendorUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		// execute!
		$responseConc = curl_exec($ch);

		// close the connection, release resources used
		curl_close($ch);

		// log do envio de para externalAgendor
		$msg2log = sprintf(  "Envio para externalAgendor: Nome: %s , email: %s , telefone: %s " , $name, $email, $phone );
		logMsg( $msg2log );
		logMsg("Resposta agendor externo:  %s", $responseConc);
	}
}

//Salva no banco de dados
if ($sendDB){

	$conn = getConnection();

	$stmt = $conn->prepare("INSERT INTO access (lead_name, lead_email, lead_phone, consulting_id, interest,
	ip, from_url, form, origins, product,
	category, id_leadlovers,  pid_leadlovers, observation,
	whatsapp, thanks_url, go_to_pay, scheduled_attendance, first_time)
	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	$stmt->bind_param("sssssssssssssssssss", $name, $email, $phone, $consulting, $interest,
	$ip, $url, $formNumber, $leadOrigins, $products,
	$category, $id, $pid, $observation,
	$sendWhatsappOption, $thanksUrl, $gotopay, $scheduled_attendance, $firstTimeLead);

	$msg2log = sprintf( "Salvar no BD: %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s", $name, $email, $phone, $consulting, $interest, $ip, $url, $formNumber, $leadOrigins, $products, $category, $id, $pid, $observation, $sendWhatsappOption, $thanksUrl, $gotopay, $scheduled_attendance, $firstTimeLead);
	logMsg( $msg2log );


	if ($stmt->execute() === TRUE) {
		//echo "New record created successfully";
		$msg2log = sprintf( "Registro criado com sucesso." );
		logMsg( $msg2log );
	} else {
		$msg2log = sprintf( "Erro na criação do Registro." );
		logMsg( $msg2log, 'error' );
		//echo "Error: " . $stmt->error . "<br>" . $conn->error;
	}

	$stmt->close();
	$conn->close();

}



//BEGIN DB FUNCTIONS
function isActiveConsulting($consulting){
	$conn = getConnection();

	$query = sprintf("SELECT consulting_status FROM consulting01 WHERE id = %s limit 1", $consulting);

	$msg2log = sprintf(  "Busca de situação de consultor: %s " , $query );
	logMsg( $msg2log );
	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_row()) {
			$isActiveConsulting = $row[0];
		}
		/* free result set */
		$result->close();
	}
	else{
		echo "Não há resultado.";
		$msg2log = sprintf( "[isActiveConsulting]Não há resultado para busca. Consultor: %s " , $consulting );
		logMsg( $msg2log );
	}
	$isActiveConsulting = $isActiveConsulting!=""?$isActiveConsulting:0;
	return $isActiveConsulting;
}


function getNextConsulting($consulting_table_number, $lastConsulting, $isPriority, $day){
	$countColumnName = "default_count";
	$dayColumnName =  "default_" . $day;

	if ($isPriority){
		$countColumnName = "priority_count";
		$dayColumnName = "priority_" . $day;
	}
	$conn = getConnection();


	$query = sprintf("SELECT id FROM consulting01 WHERE
	consulting_table = %s AND
	consulting_status = 1 AND
	%s < %s AND
	id > %s order by id
	limit 1",
    $consulting_table_number,
    $countColumnName,
	$dayColumnName,
	$lastConsulting);

	$msg2log = sprintf(  "Busca de próximo Consultor: %s " , $query );
	logMsg( $msg2log );

	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_row()) {
			$nextConsulting = $row[0];
		}
		$msg2log = sprintf(  "Last Consulting: %s | Next Consulting: %s | restarted_roundrobin: $s" , $lastConsulting , $nextConsulting, $restarted_roundrobin);
		logMsg( $msg2log );
		//Se não achou consultor maior que determinado ID começa do início novamente
		if ($lastConsulting != 0 and $nextConsulting == ""){
			$lastConsulting = 0;
			$nextConsulting = getNextConsulting($consulting_table_number, $lastConsulting, $isPriority, $day);
		}
		//Se mesmo assim não achou consultor, aloca para RC
		if ($lastConsulting == 0 and $nextConsulting == ""){
			$nextConsulting = 262497;
		}
		/* free result set */
		$result->close();
	}
	else{
		$nextConsulting = $defaultConsulting;
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	return $nextConsulting;
}


function getLastConsulting($isPriority){
	$countColumnName = "last_default_consulting_id";

	if ($isPriority){
		$countColumnName = "last_priority_consulting_id";
	}
	$conn = getConnection();


	$query = sprintf("SELECT %s FROM last_consulting WHERE reapply = 0 ORDER BY id DESC limit 1",
    $countColumnName);
	$msg2log = sprintf(  "Busca de último Consultor: %s " , $query );
	logMsg( $msg2log );

	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_row()) {
			$lastConsulting = $row[0];
		}

		/* free result set */
		$result->close();
	}
	else{
		$lastConsulting = 0;
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	$msg2log = sprintf( "getLastConsulting: %s " , $lastConsulting );
	logMsg( $msg2log );
	return $lastConsulting;
}

function isPriorityInterest($interest){

	$conn = getConnection();
	$isPriority = false;

	$query = sprintf("SELECT `priority_interest_status` FROM priority_interest WHERE
	`priority_interest_status` = 1 AND
	interest = '%s' limit 1",
    $interest);

	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_row()) {
			$isPriority = $row[0];
		}

		/* free result set */
		$result->close();
	}
	else{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	$isPriority = $isPriority!=""?$isPriority:0;
	$msg2log = sprintf(  "Busca de prioridade: %s " , $query );
	logMsg( $msg2log );

	return $isPriority;
}



function updateConsulting($isPriority, $consulting){
	$countColumnName = "default_count";

	if ($isPriority){
		$countColumnName = "priority_count";
	}
	$conn = getConnection();

	$query = sprintf("UPDATE consulting01 SET %s = %s + 1 WHERE id = %s", $countColumnName, $countColumnName, $consulting);

	if ($conn->query($query)) {
		$msg2log = sprintf(  "Consultor atualizado: %s " , $query );
		logMsg( $msg2log );

	}
	else{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}

}


function updateLastConsulting($isPriority, $consulting, $reapply){
	$countColumnName = "last_default_consulting_id";

	if ($isPriority){
		$countColumnName = "last_priority_consulting_id";
	}
	$conn = getConnection();

	$query = sprintf("INSERT INTO last_consulting (%s, reapply) VALUES (%s, %s )", $countColumnName, $consulting, $reapply);

	if ($conn->query($query)) {
		$msg2log = sprintf(  "Último Consultor atualizado: %s " , $query );
		logMsg( $msg2log );
	}
	else{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}


	return true;
}


function getConnection(){
	$servername = "52.67.235.248";
	$username = "dist";
	$password = "gr2t1d2o2019";
	$dbname = "distribuidor";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}



//BEGIN FILE FUNCTIONS
function read($file){
    $fp = fopen($file, "r");
    $conteudo = fread($fp, filesize($file));
    fclose($fp);
    return $conteudo;
}

function write($content, $writeFileName){
    $file = $writeFileName;
    $fp = fopen($file, "w+");
    fwrite($fp, $content);
    fclose($fp);
}

function logMsg( $msg, $level = 'info', $file = 'dist.log' )
{
    // log level (INFO, WARNING ou ERROR)
    $levelStr = '';

    // check log level
    switch ( $level )
    {
        case 'info':
            $levelStr = 'INFO';
            break;

        case 'warning':
             $levelStr = 'WARNING';
            break;

        case 'error':
            $levelStr = 'ERROR';
            break;
    }

    $date = date( 'Y-m-d H:i:s' );
    $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

    file_put_contents( $file, $msg, FILE_APPEND );
}

function getActualConsulting($email){

	$curl = curl_init();
	$url= sprintf( "https://api.agendor.com.br/v3/people?email=%s", $email);

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8",
		"Cache-Control: no-cache",
		"Content-Type: application/json",
		"Postman-Token: 15af1f1f-a8a6-97b5-4a56-c78e7170ed8d"
	  ),
	));
	$responseAgConsulting = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	  logMsg( $err );
	} else {
	//  echo $responseAg;
	}

	$obj = json_decode($responseAgConsulting, true);
	$actualConsulting = $obj["data"][0]["ownerUser"]["id"];

	// Agendor log - Looking for Consulting
	$msg2log = sprintf(  "Envio para Agendor (Busca de consultor do Lead): Email: %s, URL: %s", $email, $url );
	logMsg( $msg2log );
	logMsg( sprintf("actualConsulting: %s", $actualConsulting) );
	logMsg( sprintf("Resposta do agendor: %s", $responseAgConsulting) );

	return $actualConsulting;
}

if ( $responseAgTarefa ) {
	if ($sendWhatsappOption != ""){
		header($thanksUrl.$whatsappUrl);
	}
	else{
		header($thanksUrl);
	}
}


end:
	exit();
	header($thanksUrl);

?>
