"use strict";(self.webpackChunkwebpackWcBlocksStylingJsonp=self.webpackChunkwebpackWcBlocksStylingJsonp||[]).push([[4654],{66777:(e,t,s)=>{s.d(t,{w:()=>i});var n=s(47594),r=s(47143),a=s(1614),c=s(66379);const i=()=>{const{isCalculating:e,isBeforeProcessing:t,isProcessing:s,isAfterProcessing:i,isComplete:o,hasError:l}=(0,r.useSelect)((e=>{const t=e(n.CHECKOUT_STORE_KEY);return{isCalculating:t.isCalculating(),isBeforeProcessing:t.isBeforeProcessing(),isProcessing:t.isProcessing(),isAfterProcessing:t.isAfterProcessing(),isComplete:t.isComplete(),hasError:t.hasError()}})),{activePaymentMethod:d,isExpressPaymentMethodActive:m}=(0,r.useSelect)((e=>{const t=e(n.PAYMENT_STORE_KEY);return{activePaymentMethod:t.getActivePaymentMethod(),isExpressPaymentMethodActive:t.isExpressPaymentMethodActive()}})),{onSubmit:u}=(0,a.E)(),{paymentMethods:h={}}=(0,c.m)(),E=s||i||t,g=o&&!l;return{paymentMethodButtonLabel:(h[d]||{}).placeOrderButtonLabel,onSubmit:u,isCalculating:e,isDisabled:s||m,waitingForProcessing:E,waitingForRedirect:g}}},7214:(e,t,s)=>{s.r(t),s.d(t,{default:()=>E});var n=s(51609),r=s(27723),a=s(70851),c=s(86087),i=s(14656),o=s(66777),l=s(29491),d=s(47143),m=s(47594),u=s(15995),h=s(41360);const E=(0,l.withInstanceId)((({text:e,checkbox:t,instanceId:s,className:l,showSeparator:E})=>{const[g,p]=(0,c.useState)(!1),{isDisabled:_}=(0,o.w)(),P="terms-and-conditions-"+s,{setValidationErrors:b,clearValidationError:k}=(0,d.useDispatch)(m.VALIDATION_STORE_KEY),w=(0,d.useSelect)((e=>e(m.VALIDATION_STORE_KEY).getValidationError(P))),S=!(null==w||!w.message||null!=w&&w.hidden);return(0,c.useEffect)((()=>{if(t)return g?k(P):b({[P]:{message:(0,r.__)("Please read and accept the terms and conditions.","woocommerce"),hidden:!0}}),()=>{k(P)}}),[t,g,P,k,b]),(0,n.createElement)(n.Fragment,null,(0,n.createElement)(h.VM,null),(0,n.createElement)("div",{className:(0,a.A)("wc-block-checkout__terms",{"wc-block-checkout__terms--disabled":_,"wc-block-checkout__terms--with-separator":"false"!==E&&!1!==E},l)},t?(0,n.createElement)(n.Fragment,null,(0,n.createElement)(i.CheckboxControl,{id:"terms-and-conditions",checked:g,onChange:()=>p((e=>!e)),hasError:S,disabled:_},(0,n.createElement)("span",{dangerouslySetInnerHTML:{__html:e||u.R}}))):(0,n.createElement)("span",{dangerouslySetInnerHTML:{__html:e||u.G}})))}))}}]);