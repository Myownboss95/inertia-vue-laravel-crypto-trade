import{h as S,s as U,a as w,b as h,d as i,e as s,w as k,u as o,i as v,F as L}from"./main.2ec1ac8a.js";import{b as R}from"./breadcrumb.3cbbe6fe.js";import{_ as n}from"./FormGroup.a50f965d.js";import{_ as x}from"./FormButton.62df0933.js";import{_ as E}from"./ButtonLoader.75e5e296.js";import"./FormLabel.880193f6.js";import"./FormInput.2f97439c.js";import"./error.51fe4e46.js";const F={class:"col-lg-5 m-auto"},N={class:"card"},y={class:"card-body"},B=["onSubmit"],M={name:"settings",props:["settings"],setup(f){var m,r,d,u,p,c;const l=f,b=()=>{var e;return`${(e=l.settings)!=null&&e.id?"Update":"Save"} Settings`},t=S({phone:((m=l.settings)==null?void 0:m.phone)||"",email:((r=l.settings)==null?void 0:r.email)||"",notification_email:((d=l.settings)==null?void 0:d.notification_email)||"",twitter:((u=l.settings)==null?void 0:u.twitter)||"",facebook:((p=l.settings)==null?void 0:p.facebook)||"",instagram:((c=l.settings)==null?void 0:c.instagram)||""}),V=g=>{var e;(e=l.settings)!=null&&e.id?t.put(route("admin.settings.update",l.settings.id),{onBefore:()=>confirm("are you sure")}):t.post(route("admin.settings.store"))};return(g,e)=>{const _=U("Head");return w(),h(L,null,[i(_,{title:"Site Settings"}),i(R,{title:"Site Settings",crumbs:["Dashboard","Settings","Admin","Site Settings"]}),s("div",F,[s("div",N,[s("div",y,[s("form",{onSubmit:k(V,["prevent"])},[i(n,{name:"phone",placeholder:"Site Phone Number",label:"Site Phone",modelValue:o(t).phone,"onUpdate:modelValue":e[0]||(e[0]=a=>o(t).phone=a)},null,8,["modelValue"]),i(n,{name:"email",placeholder:"Site Email",label:"Site Email",modelValue:o(t).email,"onUpdate:modelValue":e[1]||(e[1]=a=>o(t).email=a)},null,8,["modelValue"]),i(n,{name:"notification_email",placeholder:"Notification Email",label:"Notification Email",modelValue:o(t).notification_email,"onUpdate:modelValue":e[2]||(e[2]=a=>o(t).notification_email=a)},null,8,["modelValue"]),i(n,{name:"twitter",placeholder:"Twitter URL",label:"Twitter URL",modelValue:o(t).twitter,"onUpdate:modelValue":e[3]||(e[3]=a=>o(t).twitter=a)},null,8,["modelValue"]),i(n,{name:"facebook",placeholder:"Facebook URL",label:"Facebook URL",modelValue:o(t).facebook,"onUpdate:modelValue":e[4]||(e[4]=a=>o(t).facebook=a)},null,8,["modelValue"]),i(n,{name:"instagram",placeholder:"Instagram URL",label:"Instagram URL",modelValue:o(t).instagram,"onUpdate:modelValue":e[5]||(e[5]=a=>o(t).instagram=a)},null,8,["modelValue"]),i(x,{type:"submit",class:"w-100 btn btn-outline-primary",disabled:o(t).processing},{default:v(()=>[i(E,{text:b,loading:o(t).processing},null,8,["loading"])]),_:1},8,["disabled"])],40,B)])])])],64)}}};export{M as default};
