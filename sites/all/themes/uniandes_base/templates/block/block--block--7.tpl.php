<section class="section-contact-form">
  <article class="container-form">
   <section class="txt-contact-form">
    <h1>¿Quieres más información?<?php //print $form['#node']->title ?></h1>
    <p>Día a día cumplimos más sueños y metas con el apoyo de personas como tú. Déjanos tus datos y nos pondremos en contacto contigo.<?php //print $form['#node']->field_descripcion_contactar['und'][0]['value'] ?></p>
  </section>

  <section class="contact-form">
    <form  action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="contactForm">

      <article class="form-group hidden">
        <input type=hidden name="oid" value="00D30000000dbAP">
        <?php 
        $host= $_SERVER["HTTP_HOST"];
        $url= "/donaciones/contacto";
        $url="https://" . $host . $url;

        ?>
        <input type=hidden name="retURL" value="<?php print $url; ?>">
        <input type=hidden id="lead_source" name="lead_source" value="Página WEB Donaciones">
      </article>

      <article class="form-group x2">
        <input tabindex="1" class="form-control" id="name" maxlength="80" name="last_name" size="20" type="text" placeholder="Nombre" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group x2">
        <input tabindex="2" class="form-control" id="phone" maxlength="40" name="phone" size="20" type="number"  placeholder="Teléfono" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group">
        <input tabindex="3" class="form-control" id="email" maxlength="80" name="email" size="20" type="email" placeholder="Email" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group">
        <section class="form-check">
         <input tabindex="4" type="checkbox" class="form-check-input" name="accept_terms" id="accept_terms" required="" aria-required="true">
         <label class="control-label" for="accept_terms"><a target="_blank" href="/donaciones/terminos-y-condiciones">Acepto términos y condiciones</a></label>
       </section>
     </article>

     <button type="submit"  class="btn-default">Enviar </button>
   </form>
 </section>
</article>
</section>	