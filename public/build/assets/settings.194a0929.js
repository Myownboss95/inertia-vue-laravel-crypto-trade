import{d as S,p as _,o as U,c as w,a as l,b as s,w as h,u as o,e as k,F as v}from"./main.bb41ae9d.js";import{b as L}from"./breadcrumb.cd2040c8.js";import{_ as n,a as R}from"./FormButton.0b4b44d6.js";import{_ as x}from"./ButtonLoader.b079e016.js";import"./FormInput.509c113a.js";const E={class:"col-lg-5 m-auto"},F={class:"card"},N={class:"card-body"},y=["onSubmit"],H={name:"settings",props:["settings"],setup(c){var m,d,r,u,p,g;const i=c;i.settings.id;const e=S({phone:((m=i.settings)==null?void 0:m.phone)||"",email:((d=i.settings)==null?void 0:d.email)||"",notification_email:((r=i.settings)==null?void 0:r.notification_email)||"",twitter:((u=i.settings)==null?void 0:u.twitter)||"",facebook:((p=i.settings)==null?void 0:p.facebook)||"",instagram:((g=i.settings)==null?void 0:g.instagram)||""}),f=b=>{var t;(t=i.settings)!=null&&t.id?e.put(route("admin.settings.update",i.settings.id),{onBefore:()=>confirm("are you sure")}):e.post(route("admin.settings.store"))};return(b,t)=>{const V=_("Head");return U(),w(v,null,[l(V,{title:"Site Settings"}),l(L,{title:"Site Settings",crumbs:["Dashboard","Settings","Admin","Site Settings"]}),s("div",E,[s("div",F,[s("div",N,[s("form",{onSubmit:h(f,["prevent"])},[l(n,{name:"phone",placeholder:"Site Phone Number",label:"Site Phone",modelValue:o(e).phone,"onUpdate:modelValue":t[0]||(t[0]=a=>o(e).phone=a)},null,8,["modelValue"]),l(n,{name:"email",placeholder:"Site Email",label:"Site Email",modelValue:o(e).email,"onUpdate:modelValue":t[1]||(t[1]=a=>o(e).email=a)},null,8,["modelValue"]),l(n,{name:"notification_email",placeholder:"Notification Email",label:"Notification Email",modelValue:o(e).notification_email,"onUpdate:modelValue":t[2]||(t[2]=a=>o(e).notification_email=a)},null,8,["modelValue"]),l(n,{name:"twitter",placeholder:"Twitter URL",label:"Twitter URL",modelValue:o(e).twitter,"onUpdate:modelValue":t[3]||(t[3]=a=>o(e).twitter=a)},null,8,["modelValue"]),l(n,{name:"facebook",placeholder:"Facebook URL",label:"Facebook URL",modelValue:o(e).facebook,"onUpdate:modelValue":t[4]||(t[4]=a=>o(e).facebook=a)},null,8,["modelValue"]),l(n,{name:"instagram",placeholder:"Instagram URL",label:"Instagram URL",modelValue:o(e).instagram,"onUpdate:modelValue":t[5]||(t[5]=a=>o(e).instagram=a)},null,8,["modelValue"]),l(R,{type:"submit",class:"w-100 btn btn-outline-primary",disabled:o(e).processing},{default:k(()=>{var a;return[l(x,{text:(a=i.settings)!=null&&a.id?"Update Settings":"Save Settings",loading:o(e).processing},null,8,["text","loading"])]}),_:1},8,["disabled"])],40,y)])])])],64)}}};export{H as default};