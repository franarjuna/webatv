import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _3003d4a6 = () => interopDefault(import('..\\pages\\arquitectura\\index.vue' /* webpackChunkName: "pages/arquitectura/index" */))
const _0ac7b568 = () => interopDefault(import('..\\pages\\atv.vue' /* webpackChunkName: "pages/atv" */))
const _76a64ef0 = () => interopDefault(import('..\\pages\\bienestar.vue' /* webpackChunkName: "pages/bienestar" */))
const _4546b714 = () => interopDefault(import('..\\pages\\contacto.vue' /* webpackChunkName: "pages/contacto" */))
const _8683ab62 = () => interopDefault(import('..\\pages\\dialogos\\index.vue' /* webpackChunkName: "pages/dialogos/index" */))
const _76052997 = () => interopDefault(import('..\\pages\\gracias.vue' /* webpackChunkName: "pages/gracias" */))
const _111b7800 = () => interopDefault(import('..\\pages\\liv\\index.vue' /* webpackChunkName: "pages/liv/index" */))
const _341e9b4e = () => interopDefault(import('..\\pages\\publicaciones\\index.vue' /* webpackChunkName: "pages/publicaciones/index" */))
const _dcd178f8 = () => interopDefault(import('..\\pages\\sens\\index.vue' /* webpackChunkName: "pages/sens/index" */))
const _ebc602ca = () => interopDefault(import('..\\pages\\urbanismo\\index.vue' /* webpackChunkName: "pages/urbanismo/index" */))
const _068ffe3e = () => interopDefault(import('..\\pages\\admin\\login.vue' /* webpackChunkName: "pages/admin/login" */))
const _c6a9f88a = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _33711736 = () => interopDefault(import('..\\pages\\arquitectura\\_slug.vue' /* webpackChunkName: "pages/arquitectura/_slug" */))
const _89f0edf2 = () => interopDefault(import('..\\pages\\dialogos\\_slug.vue' /* webpackChunkName: "pages/dialogos/_slug" */))
const _1488ba90 = () => interopDefault(import('..\\pages\\liv\\_slug.vue' /* webpackChunkName: "pages/liv/_slug" */))
const _3267fa06 = () => interopDefault(import('..\\pages\\publicaciones\\_slug.vue' /* webpackChunkName: "pages/publicaciones/_slug" */))
const _e03ebb88 = () => interopDefault(import('..\\pages\\sens\\_slug.vue' /* webpackChunkName: "pages/sens/_slug" */))
const _ef33455a = () => interopDefault(import('..\\pages\\urbanismo\\_slug.vue' /* webpackChunkName: "pages/urbanismo/_slug" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/arquitectura",
    component: _3003d4a6,
    name: "arquitectura"
  }, {
    path: "/atv",
    component: _0ac7b568,
    name: "atv"
  }, {
    path: "/bienestar",
    component: _76a64ef0,
    name: "bienestar"
  }, {
    path: "/contacto",
    component: _4546b714,
    name: "contacto"
  }, {
    path: "/dialogos",
    component: _8683ab62,
    name: "dialogos"
  }, {
    path: "/gracias",
    component: _76052997,
    name: "gracias"
  }, {
    path: "/liv",
    component: _111b7800,
    name: "liv"
  }, {
    path: "/publicaciones",
    component: _341e9b4e,
    name: "publicaciones"
  }, {
    path: "/sens",
    component: _dcd178f8,
    name: "sens"
  }, {
    path: "/urbanismo",
    component: _ebc602ca,
    name: "urbanismo"
  }, {
    path: "/admin/login",
    component: _068ffe3e,
    name: "admin-login"
  }, {
    path: "/",
    component: _c6a9f88a,
    name: "index"
  }, {
    path: "/arquitectura/:slug",
    component: _33711736,
    name: "arquitectura-slug"
  }, {
    path: "/dialogos/:slug",
    component: _89f0edf2,
    name: "dialogos-slug"
  }, {
    path: "/liv/:slug",
    component: _1488ba90,
    name: "liv-slug"
  }, {
    path: "/publicaciones/:slug",
    component: _3267fa06,
    name: "publicaciones-slug"
  }, {
    path: "/sens/:slug",
    component: _e03ebb88,
    name: "sens-slug"
  }, {
    path: "/urbanismo/:slug",
    component: _ef33455a,
    name: "urbanismo-slug"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
