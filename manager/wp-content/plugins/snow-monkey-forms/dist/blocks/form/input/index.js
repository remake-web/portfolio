(()=>{var e={184:(e,o)=>{var t;!function(){"use strict";var n={}.hasOwnProperty;function l(){for(var e=[],o=0;o<arguments.length;o++){var t=arguments[o];if(t){var a=typeof t;if("string"===a||"number"===a)e.push(t);else if(Array.isArray(t)){if(t.length){var r=l.apply(null,t);r&&e.push(r)}}else if("object"===a){if(t.toString!==Object.prototype.toString&&!t.toString.toString().includes("[native code]")){e.push(t.toString());continue}for(var s in t)n.call(t,s)&&t[s]&&e.push(s)}}}return e.join(" ")}e.exports?(l.default=l,e.exports=l):void 0===(t=function(){return l}.apply(o,[]))||(e.exports=t)}()}},o={};function t(n){var l=o[n];if(void 0!==l)return l.exports;var a=o[n]={exports:{}};return e[n](a,a.exports,t),a.exports}t.n=e=>{var o=e&&e.__esModule?()=>e.default:()=>e;return t.d(o,{a:o}),o},t.d=(e,o)=>{for(var n in o)t.o(o,n)&&!t.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:o[n]})},t.o=(e,o)=>Object.prototype.hasOwnProperty.call(e,o),(()=>{"use strict";const e=window.wp.blocks,o=JSON.parse('{"u2":"snow-monkey-forms/form--input"}'),n=window.React;var l=t(184),a=t.n(l);const r=window.wp.blockEditor,s=window.wp.data,m=window.wp.components,i=window.wp.i18n,_=window.wp.coreData;function c({attributes:e,onChangeFormStyle:o}){const{formStyle:t}=e,[l,a]=(0,_.useEntityProp)("postType","snow-monkey-forms","meta");return(0,n.createElement)(m.PanelBody,{title:(0,i.__)("Form settings","snow-monkey-forms")},(0,n.createElement)(m.ToggleControl,{label:(0,i.__)("Use confirm page","snow-monkey-forms"),checked:l.use_confirm_page,onChange:e=>a({use_confirm_page:e})}),(0,n.createElement)(m.ToggleControl,{label:(0,i.__)("Use progress tracker","snow-monkey-forms"),checked:l.use_progress_tracker,onChange:e=>a({use_progress_tracker:e})}),(0,n.createElement)(m.SelectControl,{label:(0,i.__)("Form style","snow-monkey-forms"),value:t,options:[{value:"",label:(0,i.__)("Default","snow-monkey-forms")},{value:"smf-form--simple-table",label:(0,i.__)("Simple table","snow-monkey-forms")},{value:"smf-form--letter",label:(0,i.__)("Letter","snow-monkey-forms")},{value:"smf-form--business",label:(0,i.__)("Business","snow-monkey-forms")}],onChange:o}),l.use_confirm_page&&(0,n.createElement)(n.Fragment,null,(0,n.createElement)(m.TextControl,{label:(0,i.__)("Confirm button label","snow-monkey-forms"),value:l.confirm_button_label,onChange:e=>a({confirm_button_label:e})}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Back button label","snow-monkey-forms"),value:l.back_button_label,onChange:e=>a({back_button_label:e})})),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Send button label","snow-monkey-forms"),value:l.send_button_label,onChange:e=>a({send_button_label:e})}))}const u=window.wp.element;function p(){const[e,o]=(0,u.useState)(!1);return(0,n.createElement)(m.Button,{icon:"editor-help",label:(0,i.__)("Help","snow-monkey-forms"),onClick:()=>o(!e)},e&&(0,n.createElement)(m.Popover,{className:"smf-help-popover",placement:"top"},(0,n.createElement)("ul",{style:{margin:0,padding:"13px"}},(0,n.createElement)("li",null,(0,i.__)("You can embed a submitted value in the following formats: ","snow-monkey-forms"),(0,n.createElement)("b",{style:{color:"#ca4a1f"}},"{"),"name",(0,n.createElement)("b",{style:{color:"#ca4a1f"}},"}")),(0,n.createElement)("li",null,(0,i.__)("You can embed all submitted values ​​in the following format: ","snow-monkey-forms"),(0,n.createElement)("b",{style:{color:"#ca4a1f"}},"{all-fields}")))))}function y(){const[e,o]=(0,_.useEntityProp)("postType","snow-monkey-forms","meta"),t={borderColor:"#d94f4f"};return(0,n.createElement)(m.PanelBody,{title:(0,i.__)("Administrator email","snow-monkey-forms")},(0,n.createElement)(m.TextControl,{label:(0,i.__)("To (Email address)","snow-monkey-forms"),value:e.administrator_email_to,onChange:e=>o({administrator_email_to:e}),style:e.administrator_email_to?void 0:t}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Subject","snow-monkey-forms"),value:e.administrator_email_subject,onChange:e=>o({administrator_email_subject:e}),style:e.administrator_email_subject?void 0:t}),(0,n.createElement)(m.TextareaControl,{label:(0,i.__)("Body","snow-monkey-forms"),value:e.administrator_email_body,onChange:e=>o({administrator_email_body:e}),style:e.administrator_email_body?void 0:t}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Reply-To (Email address)","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.administrator_email_replyto,onChange:e=>o({administrator_email_replyto:e})}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("From (Email address)","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.administrator_email_from,onChange:e=>o({administrator_email_from:e})}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Sender","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.administrator_email_sender,onChange:e=>o({administrator_email_sender:e})}),(0,n.createElement)(p,null))}function f(){const[e,o]=(0,_.useEntityProp)("postType","snow-monkey-forms","meta"),t={borderColor:"#d94f4f"};return(0,n.createElement)(m.PanelBody,{title:(0,i.__)("Auto reply email","snow-monkey-forms")},(0,n.createElement)(m.TextControl,{label:(0,i.__)("To (Email address)","snow-monkey-forms"),help:(0,i.__)("Enter the name attribute value of the installed email form field in the following format: {name}","snow-monkey-forms"),value:e.auto_reply_email_to,onChange:e=>o({auto_reply_email_to:e}),style:e.auto_reply_email_to||!e.auto_reply_email_subject&&!e.auto_reply_email_body?void 0:t}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Subject","snow-monkey-forms"),value:e.auto_reply_email_subject,onChange:e=>o({auto_reply_email_subject:e}),style:e.auto_reply_email_to&&!e.auto_reply_email_subject?t:void 0}),(0,n.createElement)(m.TextareaControl,{label:(0,i.__)("Body","snow-monkey-forms"),value:e.auto_reply_email_body,onChange:e=>o({auto_reply_email_body:e}),style:e.auto_reply_email_to&&!e.auto_reply_email_body?t:void 0}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Reply-To (Email address)","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.auto_reply_email_replyto,onChange:e=>o({auto_reply_email_replyto:e})}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("From (Email address)","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.auto_reply_email_from,onChange:e=>o({auto_reply_email_from:e})}),(0,n.createElement)(m.TextControl,{label:(0,i.__)("Sender","snow-monkey-forms"),help:(0,i.__)("Optional","snow-monkey-forms"),value:e.auto_reply_email_sender,onChange:e=>o({auto_reply_email_sender:e})}),(0,n.createElement)(p,null))}(0,e.registerBlockType)(o.u2,{icon:{foreground:"#cd162c",src:"editor-ul"},edit:function(e){const{attributes:o,setAttributes:t,className:l}=e,{formStyle:_}=o,u=a()("smf-form",l,{[_]:!!_}),p=(0,r.useBlockProps)({className:["components-panel","snow-monkey-forms-setting-panel"]}),d=(0,r.useInnerBlocksProps)({className:u},{allowedBlocks:["snow-monkey-forms/item"],templateLock:!1});return(0,n.createElement)(n.Fragment,null,(0,n.createElement)(r.InspectorControls,null,(0,n.createElement)(c,{...e,onChangeFormStyle:e=>t({formStyle:e})}),(0,n.createElement)(y,null),(0,n.createElement)(f,null)),(0,n.createElement)("div",{...p},(0,n.createElement)("div",{className:"components-panel__header edit-post-sidebar-header snow-monkey-forms-setting-panel__header"},(0,i.__)("Input","snow-monkey-forms"),(0,n.createElement)(m.Button,{isSecondary:!0,onClick:()=>(0,s.dispatch)("core/edit-post").openGeneralSidebar("edit-post/block")},(0,i.__)("Open the form settings","snow-monkey-forms"))),(0,n.createElement)("div",{className:"components-panel__body is-opened snow-monkey-forms-setting-panel__body"},(0,n.createElement)("div",{...d}))))},save:function({attributes:e,className:o}){const{formStyle:t}=e,l=a()("smf-form",o,{[t]:!!t});return(0,n.createElement)("div",{...r.useInnerBlocksProps.save(r.useBlockProps.save({className:l}))})}})})()})();