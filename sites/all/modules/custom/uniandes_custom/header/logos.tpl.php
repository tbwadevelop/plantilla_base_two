<?php
global $base_path;
$color_2 = variable_get('uniandes_custom_color_secundario', "#484851");

$logoHTitle = variable_get('uniandes_custom_logo_header_title', 'Logo facultad');
$facultadHeader = file_load(variable_get('uniandes_custom_logo_header'));
$facultadHeaderUrl = ($facultadHeader) ? file_create_url($facultadHeader->uri) : false;
?>
<a class="navbar-brand" href="<?php echo $base_path ?>">
	<svg xmlns="http://www.w3.org/2000/svg" id="logo-andes" data-name="logo andes" viewBox="0 0 620 239" style="
	fill: #<?php echo $color_2 ?>;"><defs></defs><title>UniversidadDeLosAndes+Colombia</title><path class="cls-1" d="M145.71,166.15c-32.12,20.84-65.48,19.7-65.48,19.7a49.17,49.17,0,0,1-.55-11.59C80,166.92,84.05,169,87,163.19a48.52,48.52,0,0,0,3.6-8.49c.07-.21-1.93-35.36-2.43-50.28-.27-8-1.79-21.45-3.56-34.49-1-7.73-3.39-13.86-4.48-21.19-1.57-10.6-3.39-22.55-3.39-22.55-1.31,3.37-3.18,16-5.06,30.25-.9,6.83-1.81,14-2.65,20.78-1.78,14.28-6.24,52.5-6.92,54.57-1,3.14-1.12-.83-1.12-.83s2.64-40.08,3.43-57.67c.39-8.59,1-18,2.11-27.1a186.36,186.36,0,0,1,3.2-19.25s4.6-13.87,6.06-14.14,6.76,8.74,8.55,16.76C88.34,47.68,90.72,50,93.81,69c2.94,18.08,5.62,33.21,6,35.68,1.31,9,.66,37-1.6,48.11-.54,3-.7,4.16-2.68,6.17-4.66,4.71-8,10.32-8,14s-.62,3.6.26,5.73c0,0,6.14,9.19,41.42-11.85,0,0,11-5.77,11-18.53v-129s-35-11.83-61.94-11.83-60.7,11.81-60.7,11.81v128.4c0,7.9,1.16,22.73,12.44,27.78,0,0-30.05-10.28-30.05-27.94V8.44S45.88,0,78.33,0s79.15,8.44,79.15,8.44V147.76C157.48,159.76,145.71,166.15,145.71,166.15Z"></path><path class="cls-1" d="M581.69,58.37q-4.8,2.67-12.93,2.68c-5.45,0-9.7-1.65-12.72-5s-4.54-7.92-4.54-13.84S553,31.55,556,28a14.69,14.69,0,0,1,11.7-5.09,19.25,19.25,0,0,1,5.57.71v-15h8.37Zm-8.37-3.53V28.15a13.28,13.28,0,0,0-3.71-.48q-9.78,0-9.77,14.1,0,13.91,9.15,13.91A8.43,8.43,0,0,0,573.32,54.85Z"></path><path class="cls-1" d="M620,41.57l-22.72,3.3q1,10.31,10.12,10.31a20.43,20.43,0,0,0,9.35-2l2,5.29q-4.75,2.61-12.24,2.61-8,0-12.59-5t-4.62-14.31q0-9,4.23-14.07t11.59-5.05q7.44,0,11.29,4.85T620,41.57Zm-7.85-3.29q0-10.52-7.32-10.52a6.7,6.7,0,0,0-5.92,3.1c-1.51,2.24-2.23,5.5-2.13,9.76Z"></path><path class="cls-1" d="M197.89,159.31H184.73V77.93h13.17Z"></path><path class="cls-1" d="M258.62,130.29q0,13.47-5.94,21.45-6.48,8.62-18.23,8.62t-18.23-8.62q-5.94-8-5.94-21.45t5.94-21.57q6.46-8.62,18.23-8.63t18.23,8.63Q258.61,116.7,258.62,130.29Zm-13.06-.11q0-21.78-11.11-21.79t-11.1,21.79q0,21.24,11.1,21.25T245.56,130.19Z"></path><path class="cls-1" d="M303.74,142.58A16.27,16.27,0,0,1,298,155.09q-5.72,5.18-15,5.17-9.93,0-16.07-4.19l3.45-8.41q4.22,3.35,10.9,3.34a9.13,9.13,0,0,0,6.48-2.32,7.7,7.7,0,0,0,2.48-5.88,8.16,8.16,0,0,0-1.94-5.76,17.16,17.16,0,0,0-6.58-3.84q-13.27-5.06-13.26-16.28a15.86,15.86,0,0,1,5.12-12q5.12-4.85,13.31-4.86A26.92,26.92,0,0,1,302,104.2l-3.23,7.66a14.24,14.24,0,0,0-9.27-3.25,8.21,8.21,0,0,0-6.07,2.21,7.41,7.41,0,0,0-2.21,5.45q0,5.71,8.62,9.16Q303.73,131,303.74,142.58Z"></path><path class="cls-1" d="M400.84,159.31H385.47l-6.22-20.74h-26l-6.45,20.74H333.42l26.74-80.67h14.06Zm-23.69-29.42-8.32-28.41a54.07,54.07,0,0,1-2.11-9.74h-.23c-.39,2.11-1.14,5.35-2.24,9.74l-8.67,28.41Z"></path><path class="cls-1" d="M455,159.31H441.79v-41.2q0-9.72-10.44-9.71a24.47,24.47,0,0,0-9.06,1.62v49.29H409.12v-55q9-4.2,22.75-4.21,12.21,0,18,5.39Q455,110,455,117.9Z"></path><path class="cls-1" d="M514.29,156.17q-7.55,4.2-20.28,4.2t-20-7.76q-7.11-7.77-7.11-21.68T474,108.61q6.92-8,18.35-8a30.93,30.93,0,0,1,8.75,1.09V78.19h13.16Zm-13.16-5.5V108.84a20.7,20.7,0,0,0-5.83-.76q-15.33,0-15.32,22.1Q480,152,494.34,152C497.5,152,499.76,151.54,501.13,150.67Z"></path><path class="cls-1" d="M574.19,129.86l-35.6,5.19q1.61,16.17,15.85,16.17A31.55,31.55,0,0,0,569.12,148l3.13,8.28q-7.44,4.11-19.2,4.1-12.51,0-19.74-7.87t-7.23-22.42q0-14.13,6.63-22.06t18.17-7.93q11.67,0,17.7,7.61T574.19,129.86Zm-12.32-5.18q0-16.5-11.43-16.5a10.51,10.51,0,0,0-9.28,4.85q-3.56,5.29-3.34,15.31Z"></path><path class="cls-1" d="M619.43,142.58a16.28,16.28,0,0,1-5.72,12.51q-5.71,5.18-15,5.17-9.92,0-16.07-4.19l3.44-8.41Q590.29,151,597,151a9.07,9.07,0,0,0,6.46-2.32,7.66,7.66,0,0,0,2.49-5.88A8.17,8.17,0,0,0,604,137a17.18,17.18,0,0,0-6.58-3.84q-13.27-5.06-13.27-16.28a15.84,15.84,0,0,1,5.12-12q5.13-4.85,13.32-4.86a26.9,26.9,0,0,1,15.09,4.1l-3.23,7.66a14.23,14.23,0,0,0-9.26-3.25,8.24,8.24,0,0,0-6.08,2.21,7.43,7.43,0,0,0-2.2,5.45q0,5.71,8.62,9.16Q619.42,131,619.43,142.58Z"></path><path class="cls-1" d="M254.17,60.5h-8.38V34.2q0-6.19-6.67-6.2a15.52,15.52,0,0,0-5.78,1V60.5H225V25.4q5.7-2.68,14.51-2.69,7.77,0,11.47,3.44a10.07,10.07,0,0,1,3.23,7.91Z"></path><path class="cls-1" d="M272.24,12.85a3.79,3.79,0,0,1-1.34,2.93,5,5,0,0,1-6.54,0A3.8,3.8,0,0,1,263,12.85a3.89,3.89,0,0,1,1.34-3,4.64,4.64,0,0,1,3.27-1.24,4.75,4.75,0,0,1,3.27,1.2A3.86,3.86,0,0,1,272.24,12.85ZM271.8,60.5h-8.38V23.4h8.38Z"></path><path class="cls-1" d="M310,23.4,298.1,60.5h-8L278,23.4H287l6.54,23.94a23.92,23.92,0,0,1,.9,5.09h.13q.35-2,1-5.09l6.68-23.94Z"></path><path class="cls-1" d="M345.16,41.69,322.45,45q1,10.32,10.11,10.31a20.45,20.45,0,0,0,9.36-2l2,5.28q-4.75,2.62-12.25,2.61-8,0-12.6-5t-4.61-14.3q0-9,4.24-14.07t11.59-5.06q7.43,0,11.29,4.85T345.16,41.69Zm-7.84-3.29q0-10.53-7.31-10.53A6.71,6.71,0,0,0,324.08,31q-2.27,3.38-2.14,9.78Z"></path><path class="cls-1" d="M370.66,22.76,369,28.9a12.21,12.21,0,0,0-3.87-.61,8,8,0,0,0-4,.9V60.5h-8.38V25.38Q358.91,22.42,370.66,22.76Z"></path><path class="cls-1" d="M397.41,49.83a10.41,10.41,0,0,1-3.65,8,13.71,13.71,0,0,1-9.57,3.3q-6.34,0-10.26-2.69l2.2-5.37a10.83,10.83,0,0,0,7,2.15,5.81,5.81,0,0,0,4.13-1.48A5,5,0,0,0,388.81,50a5.27,5.27,0,0,0-1.23-3.68,11,11,0,0,0-4.2-2.44q-8.47-3.24-8.47-10.4a10.13,10.13,0,0,1,3.27-7.64,11.84,11.84,0,0,1,8.49-3.1,17.21,17.21,0,0,1,9.63,2.61l-2.06,4.88a9.11,9.11,0,0,0-5.92-2.07,5.25,5.25,0,0,0-3.88,1.42A4.75,4.75,0,0,0,383,33q0,3.66,5.51,5.85Q397.41,42.46,397.41,49.83Z"></path><path class="cls-1" d="M413.82,12.85a3.82,3.82,0,0,1-1.33,2.93,5,5,0,0,1-6.54,0,3.78,3.78,0,0,1-1.34-2.93,3.87,3.87,0,0,1,1.34-3,4.62,4.62,0,0,1,3.27-1.24,4.75,4.75,0,0,1,3.26,1.2A3.89,3.89,0,0,1,413.82,12.85Zm-.43,47.65H405V23.4h8.37Z"></path><path class="cls-1" d="M451.49,58.48q-4.82,2.69-12.93,2.68t-12.73-5q-4.54-4.95-4.54-13.83t4.54-14.25A14.72,14.72,0,0,1,437.54,23a19.46,19.46,0,0,1,5.57.7v-15h8.37ZM443.12,55V28.27a13.47,13.47,0,0,0-3.72-.48q-9.78,0-9.77,14.11,0,13.9,9.15,13.9A8.55,8.55,0,0,0,443.12,55Z"></path><path class="cls-1" d="M487.21,58.48q-5,2.69-13.42,2.68-15.14,0-15.12-11.28a10.86,10.86,0,0,1,6.12-10.11q4.81-2.61,14.58-3.57v-2q0-6.12-7.36-6.12a21.2,21.2,0,0,0-9.28,2.25l-1.93-4.82a28.63,28.63,0,0,1,12.73-2.82q13.68,0,13.69,12.8Zm-7.84-3V40.19q-6.6.84-9.34,2.55-3.43,2.13-3.43,6.88,0,6.89,7.76,6.88A11.08,11.08,0,0,0,479.37,55.47Z"></path><path class="cls-1" d="M525,58.48q-4.83,2.69-12.94,2.68c-5.46,0-9.7-1.66-12.74-5s-4.53-7.9-4.53-13.83,1.52-10.72,4.54-14.25A14.71,14.71,0,0,1,511,23a19.45,19.45,0,0,1,5.58.7v-15H525ZM516.62,55V28.27a13.4,13.4,0,0,0-3.72-.48q-9.77,0-9.77,14.11,0,13.9,9.15,13.9A8.52,8.52,0,0,0,516.62,55Z"></path><path class="cls-1" d="M184.62,8.84h8.93V48.73q0,6.57,7.09,6.58a16.48,16.48,0,0,0,6.13-1.1V8.84h8.93V58.09q-6.07,2.85-15.43,2.85-8.26,0-12.21-3.65a10.69,10.69,0,0,1-3.44-8.41Z"></path><path class="cls-1" d="M472,224a16.89,16.89,0,0,1-2.58,9.76,11,11,0,0,1-17.5,0,16.84,16.84,0,0,1-2.58-9.76q0-6.07,2.58-9.81,2.94-4.35,8.75-4.35a9.87,9.87,0,0,1,8.75,4.35Q472,217.9,472,224Zm-6.12-.08q0-10.19-5.21-10.19t-5.21,10.19q0,9.94,5.21,9.94t5.21-9.94Z"></path><polygon class="cls-1" points="483.09 237.82 476.86 237.82 476.86 199.53 483.09 199.53 483.09 237.82 483.09 237.82"></polygon><path class="cls-1" d="M446.82,236.35c-1.83,1.42-4.45,2.13-7.89,2.13a12.55,12.55,0,0,1-11.38-6.33q-3.24-5.26-3.24-13.25a24.6,24.6,0,0,1,3.34-13.2A12.56,12.56,0,0,1,439,199.32a13.24,13.24,0,0,1,7.85,2.13l-1.53,4.19a9.55,9.55,0,0,0-5-1.31q-4.91,0-7.14,5.16a23.46,23.46,0,0,0-1.62,9.36,22.28,22.28,0,0,0,1.73,9.21q2.29,5.06,7,5.06a8.75,8.75,0,0,0,4.8-1.32l1.68,4.56Z"></path><path class="cls-1" d="M487.94,223.83q0-6.06,2.59-9.8,2.93-4.36,8.75-4.35T508,214q2.57,3.74,2.57,9.8A16.93,16.93,0,0,1,508,233.6a11,11,0,0,1-17.5,0,16.83,16.83,0,0,1-2.59-9.77Zm6.13-.07q0,9.94,5.21,9.94t5.21-9.94q0-10.2-5.21-10.19t-5.21,10.19Z"></path><polygon class="cls-1" points="476.86 237.69 483.09 237.69 483.09 199.39 476.86 199.39 476.86 237.69 476.86 237.69"></polygon><path class="cls-1" d="M552.29,238h-6.17V218.66q0-4.46-4.6-4.45a6.18,6.18,0,0,0-4.55,1.87v22h-6.17V218.54q0-4.33-5.11-4.33a10.48,10.48,0,0,0-4,.75V238h-6.17v-25.8a23.59,23.59,0,0,1,10.22-2q5.77,0,8.49,3,3.24-3,8.76-3a10.29,10.29,0,0,1,6.7,2.17,7.54,7.54,0,0,1,2.65,6.18V238Z"></path><path class="cls-1" d="M580.24,223.38q0,6.73-3.19,10.57c-2.3,2.8-5.63,4.2-10,4.2q-6,0-9-2V199.41h6.12v11.73a12.7,12.7,0,0,1,5.37-1.12,9.34,9.34,0,0,1,8.19,4.2,15.67,15.67,0,0,1,2.53,9.15Zm-6.13.39q0-10.15-6.27-10.14a7.51,7.51,0,0,0-3.69.81v19.42a7.78,7.78,0,0,0,3.14.56q6.83,0,6.83-10.65Z"></path><path class="cls-1" d="M592.48,202.64a2.75,2.75,0,0,1-1,2.18,3.6,3.6,0,0,1-2.38.86,3.56,3.56,0,0,1-2.38-.86,2.73,2.73,0,0,1-1-2.18,2.79,2.79,0,0,1,1-2.2,3.5,3.5,0,0,1,2.38-.89,3.61,3.61,0,0,1,2.38.86,2.79,2.79,0,0,1,1,2.23Zm-.3,35H586V210.38h6.22v27.27Z"></path><path class="cls-1" d="M619.18,235.86q-3.69,2-9.87,2-11.12,0-11.12-8.3,0-5.3,5.31-7.84,3.29-1.57,9.92-2.23V218q0-4.5-5.41-4.5a15.48,15.48,0,0,0-6.83,1.68l-1.42-3.54a21.08,21.08,0,0,1,9.36-2.07q10.07,0,10.07,9.41v16.89Zm-5.77-2.23V222.41A19.73,19.73,0,0,0,607,224a5.6,5.6,0,0,0-3,5.36q0,5.05,5.74,5.05a8.25,8.25,0,0,0,3.72-.76Z"></path>
	</svg>
	<?php if($facultadHeaderUrl){ ?>
		<figure id="faculty-logo" class="border_base">
			<img src="<?php print $facultadHeaderUrl ?>" alt="<?php echo $logoHTitle;?>" tittle="<?php echo $logoHTitle;?>">
		</figure>
	<?php } ?>
</a>