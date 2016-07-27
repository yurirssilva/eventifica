<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta name="description" content="jQuery-Mask-Plugin - A jQuery plugin to make field masks" />
  <meta name="author" content="Igor Escobar" />
  <title>jQuery Mask Plugin - A jQuery Plugin to make masks on form fields and html elements.</title>

<link rel="stylesheet" href="<? echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="https://yandex.st/highlightjs/7.3/styles/default.min.css">

  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <!-- <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'> -->
  <!-- <link href='https://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'> -->
  <style type="text/css">
    * {font-family: 'Lato', sans-serif;}
    .container {width:773px;}
    h1 {margin-bottom:10px}
    h1 .jq-label {font-size: 35px; color: #CFCFCF; display:block;margin:21px 2px 40px 13px;}
    h1 .plugin-name {font-size:140px; color: #6BBEC7;}
    span.subtitle {margin-bottom:20px;}
    div#examples div.col {width:246px;float:left;}

    div#examples div.col.center {text-align:center;}
    div#examples div.col.center.banner {border: 1px solid #ccc; padding:15px; margin-top:24px;}

    pre {overflow-x: auto; white-space:pre; word-wrap:normal; font-size:12px;}
  </style>
</head>
<body>
  <div class="container">
  <h1><span class="jq-label">jQuery</span> <span class="plugin-name">Mask Plugin</span></h1>
  <span class="subtitle">A jQuery Plugin to make masks on form fields and html elements.</span> <br /> <br />
  <h2>Demonstrations</h2>

  <div id="examples">
    <div class="col">
      <label>Date</label>
      <input type="text" class="date"/>
      <label>Hour</label>
      <input type="text" class="time"/>
      <label>Date &amp; Hour</label>
      <input type="text" class="date_time"/>
      <label>Zip-Code</label>
      <input type="text" class="cep"/>
      <label>With Callbacks (open console)</label>
      <input type="text" class="cep_with_callback"/>
      <label>Crazy Zip-Code</label>
      <input type="text" class="crazy_cep"/>
      <label>Money</label>
      <input type="text" class="money"/>
      <label>Mask placeholder option</label>
      <input type="text" class="placeholder"/>
      <label>Masks on div elements!</label>
      <div class="mask-on-div">12345678909</div> <input type="button" class="bt-mask-it" value="Mask it!"/>
    </div>
    <div class="col">
      <label>Telephone</label>
      <input type="text" class="phone"/>
      <label>Telephone with Code Area</label>
      <input type="text" class="phone_with_ddd"/>
      <label>US Telephone</label>
      <input type="text" class="phone_us"/>
      <label>São Paulo Celphones</label>
      <input type="text" class="sp_celphones"/>
      <label>Mixed Type Mask</label>
      <input type="text" class="mixed"/>
      <label>CPF</label>
      <input type="text" class="cpf"/>
      <label>CNPJ</label>
      <input type="text" class="cnpj"/>
      <label>IP Address</label>
      <input type="text" class="ip_address"/>
      <label>Mask with Clear If Not Match Option</label>
      <input type="text" class="clear-if-not-match"/>
      <label>Mask with a Fallback Digit</label>
      <input type="text" class="fallback"/>
      <label>Mask with selectOnFocus</label>
      <input type="text" class="selectonfocus"/>
    </div>
<!--     <div class="col center banner">
      <p>The <a href="https://igorescobar.github.com/jQuery-Mask-Plugin/">jQuery Mask Plugin</a> was written by <a href="http://www.igorescobar.com/" rel="author" target="_blank">Igor Escobar</a> and the source-code's available in <a href="https://github.com/igorescobar/jQuery-Mask-Plugin" target="_blank">GitHub</a>.</p>
      <h3>Buy me a beer :o)</h3> <br/>
	      <h4>Donate via Pladgie</h4>
        <a href="https://pledgie.com/campaigns/22649"><img alt="Click here to lend your support to: jQuery Mask Plugin and make a donation at pledgie.com !" src="https://pledgie.com/campaigns/22649.png?skin_name=chrome" border="0"></a> <br> <br>
  	    <h4>Donate via Flattr</h4>
        <script id="fb3cw6z">(function(i){var f,s=document.getElementById(i);f=document.createElement('iframe');f.src='//api.flattr.com/button/view/?uid=igorescobar&url='+encodeURIComponent(document.URL);f.title='Flattr';f.height=62;f.width=55;f.style.borderWidth=0;s.parentNode.insertBefore(f,s);})('fb3cw6z');</script>
    </div> -->
  </div>
  <br clear="all"/><br clear="all"/><br clear="all"/>
  <div id="code-samples">
    <h1>Documentation</h1>
    <h2>Basic Usage Examples</h2>
<pre>
$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
);</pre>

    <h3>Callback Examples</h3>
<pre>
var options =  {
  onComplete: function(cep) {
    alert('CEP Completed!:' + cep);
  },
  onKeyPress: function(cep, event, currentField, options){
    console.log('An key was pressed!:', cep, ' event: ', event,
                'currentField: ', currentField, ' options: ', options);
  },
  onChange: function(cep){
    console.log('cep changed! ', cep);
  },
  onInvalid: function(val, e, f, invalid, options){
    var error = invalid[0];
    console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
  }
};

$('.cep_with_callback').mask('00000-000', options);
</pre>
    <h3>On-the-fly mask change</h3>
<pre>
var options =  {onKeyPress: function(cep, e, field, options){
  var masks = ['00000-000', '0-00-00-00'];
    mask = (cep.length>7) ? masks[1] : masks[0];
  $('.crazy_cep').mask(mask, options);
}};

$('.crazy_cep').mask('00000-000', options);
</pre>

    <h3>Mask as a function</h3>
<pre>
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.sp_celphones').mask(SPMaskBehavior, spOptions);
</pre>

    <h3>Using HTML Notation Exemples</h3>

    To get your mask applied with the data-mask attribute just use it as the same way you use with the $.mask function. <br/> <br/>
<pre>
&lt;input type=&quot;text&quot; name=&quot;field-name&quot; data-mask=&quot;00/00/0000&quot; /&gt;
</pre>
  Activating a reversible mask <br/> <br/>
<pre>
&lt;input type=&quot;text&quot; name=&quot;field-name&quot; data-mask=&quot;00/00/0000&quot; data-mask-reverse=&quot;true&quot; /&gt;
</pre>

  Using clearIfNotMatch option <br/> <br/>
<pre>
&lt;input type=&quot;text&quot; name=&quot;field-name&quot; data-mask=&quot;00/00/0000&quot; data-mask-clearifnotmatch=&quot;true&quot; /&gt;
</pre>

 Using selectOnFocus option <br/> <br/>
<pre>
&lt;input type=&quot;text&quot; name=&quot;field-name&quot; data-mask=&quot;00/00/0000&quot; data-mask-selectonfocus=&quot;true&quot; /&gt;
</pre>

<br />
<h3>Translation</h3>
Teach to jQuery Mask Plugin how to apply your mask: <br/><br/>

<pre>
// now the digit 0 on your mask pattern will be interpreted
// as valid characters like 0,1,2,3,4,5,6,7,8,9 and *
$('.your-field').mask('00/00/0000', {'translation': {0: {pattern: /[0-9*]/}}});
</pre>

    By default, jQuery Mask Plugin only reconizes the logical digit A (Numbers and Letters) and S (A-Za-z) but
    you can extend or modify this behaviour by telling to jQuery Mask Plugin how to interpret those logical digits. <br/><br/>

<pre>
$('.your-field').mask('AA/SS/YYYY', {'translation': {
                                        A: {pattern: /[A-Za-z0-9]/},
                                        S: {pattern: /[A-Za-z]/},
                                        Y: {pattern: /[0-9]/}
                                      }
                                });
</pre>
    Now jQuery Mask Plugin knows the logic digit Y and you can create your own pattern. <br/><br/>

    <h4>Optional digits</h4>  <br/>

    You can also tell to jQuery Mask which digit is optional, to create a IP mask for example: <br/><br/>

<pre>
// way 1
$('.ip_address').mask('099.099.099.099');
// way 2
$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
</pre>

    Now, all <strong>Z</strong> digits in your masks is optional. <br /> <br />

    <h4>Recursive digits</h4> <br/>

    With jQuery Mask Plugin you can also define recursive patterns inside your mask: <br/><br/>
    <pre>$('.money_example').mask('#.##0,00', {reverse: true});</pre>
    With example above the mask will be placed from the right to the left (that's why reverse:true is defined). As soon as you start typing, a "0,00" will be applied followed by repeating recursively the following pattern "#.##". The result could be something like: 1.234.567,890. <br /><br />

    You can also use that kind of feature to define what kind of data could be typed inside of a field:
    <pre>$('.example').mask('0#');</pre>
    Now only numbers will be allowed inside your form field. <br /> <br />

    <h4>Fallback digits</h4>

    When a user types a invalid char for the current position the plugin will replace it by its fallback instead of erasing them.

<pre>
$('.field_with_fallback').mask("00r00r0000", {
  translation: {
    'r': {
      pattern: /[\/]/,
      fallback: '/'
    },
    placeholder: "__/__/____"
  }
});
</pre>

    <br /><h3>Removing the mask</h3>
    <pre>$('.date').unmask();</pre>

    <br /><h3>Getting the unmasked typed value</h3>
    <pre>$('.date').cleanVal();</pre>

    <br /><h3>Getting a masked value programmatically</h3>
    <pre>$('.date').masked('19840807');</pre>

<br />
<h2>Customization</h2>

jQuery Mask Plugin has a few default options that you can overwrite as you like:
<h3>Field Options</h3>
<pre>
var custom_options = {
  byPassKeys: [8, 9, 37, 38, 39, 40],
  translation: {
                '0': {pattern: /\d/},
                '9': {pattern: /\d/, optional: true},
                '#': {pattern: /\d/, recursive: true},
                'A': {pattern: /[a-zA-Z0-9]/},
                'S': {pattern: /[a-zA-Z]/}
            };
};</pre>
<strong> byPassKeys </strong> list of keyboard's <a href="http://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes" target="_blank">keyCode</a> that you want to be ignored when it was pressed. <br />
<strong> translation </strong> object with all digits that should be interpreted as a special chars and its regex representation. <br /> <br />

<h3>Public Methods</h3>
<pre>
/**
 * Applies the mask to the matching selector elements.
 *
 * @selector elements to be masked.
 * @mask should be a string or a function.
 * @options should be an object.
 **/
$(selector).mask(mask [, options]);

/**
 * Seek and destroy.
 *
 * @selector elements to be masked.
 **/
$(selector).unmask();

/**
 * Gets the value of the field without the mask.
 *
 * @selector elements to be masked.
 **/
$(selector).cleanVal();

/**
 * Applies the mask to the matching selector elements.
 *
 * @selector optional: elements to be masked. The default behaviour it's to lookup for all elements with data-mask attribute.
 **/
$.applyDataMask([selector]);
</pre>
<h3>Global Options</h3>
<pre>
// nonInput: elements we consider nonInput
// dataMask: we mask data-mask elements by default
// watchInputs: watch for dynamically added inputs by default
// watchDataMask: by default we disabled the watcher for dynamically added data-mask elements by default (performance reasons)
 $.jMaskGlobals = {
    maskElements: 'input,td,span,div',
    dataMaskAttr: '*[data-mask]',
    dataMask: true,
    watchInterval: 300,
    watchInputs: true,
    watchDataMask: false,
    byPassKeys: [9, 16, 17, 18, 36, 37, 38, 39, 40, 91],
    translation: {
        '0': {pattern: /\d/},
        '9': {pattern: /\d/, optional: true},
        '#': {pattern: /\d/, recursive: true},
        'A': {pattern: /[a-zA-Z0-9]/},
        'S': {pattern: /[a-zA-Z]/}
    }
  };
</pre>
  </div>

<br clear="all" />

</div>

<script src="https://yandex.st/highlightjs/7.3/highlight.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="<? echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<? echo base_url('assets/js/jquery.mask.js') ?>"></script>

<script type="text/javascript">
  $(function() {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });

    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    $('.cep_with_callback').mask('00000-000', {onComplete: function(cep) {
        console.log('Mask is done!:', cep);
      },
       onKeyPress: function(cep, event, currentField, options){
        console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
      },
      onInvalid: function(val, e, field, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
      }
    });

    $('.crazy_cep').mask('00000-000', {onKeyPress: function(cep, e, field, options){
      var masks = ['00000-000', '0-00-00-00'];
        mask = (cep.length>7) ? masks[1] : masks[0];
      $('.crazy_cep').mask(mask, options);
    }});

    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask('#.##0,00', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);

    $(".bt-mask-it").click(function(){
      $(".mask-on-div").mask("000.000.000-00");
      $(".mask-on-div").fadeOut(500).fadeIn(500)
    })

    $('pre').each(function(i, e) {hljs.highlightBlock(e)});
  });
</script>
</body>
</html>
