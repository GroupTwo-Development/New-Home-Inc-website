import { initInterframe } from '../lib/Interframe';
import {
  backgroundIframeUrl,
  impactLink,
  iframeUrl,
} from '../constants/leadinConfig';

function getIframeHeight() {
  const sideMenuHeight = document.getElementById('adminmenuwrap').offsetHeight;
  const adminBarHeight =
    document.getElementById('wpadminbar').offsetHeight || 0;
  if (window.innerHeight < sideMenuHeight) {
    return sideMenuHeight;
  } else {
    return window.innerHeight - adminBarHeight;
  }
}

function addIframeResizeEvent(iframe) {
  let animationFrame;
  window.addEventListener(
    'resize',
    () => {
      if (animationFrame) {
        cancelAnimationFrame(animationFrame);
      }
      animationFrame = requestAnimationFrame(() => {
        iframe.style.minHeight = `${getIframeHeight()}px`;
      });
    },
    true
  );
}

function createIframeElement(iframeSrc) {
  const iframe = document.createElement('iframe');
  iframe.id = 'leadin-iframe';
  iframe.src = iframeSrc;
  iframe.setAttribute('referrerpolicy', 'no-referrer-when-downgrade');
  iframe.style.minHeight = `${getIframeHeight()}px`;
  addIframeResizeEvent(iframe);
  return iframe;
}

export function createIframe() {
  const iframe = createIframeElement(impactLink || iframeUrl);
  initInterframe(iframe);
  document.getElementById('leadin-iframe-container').appendChild(iframe);
}

export function createBackgroundIframe() {
  const iframe = createIframeElement(backgroundIframeUrl);
  iframe.style.display = 'none';
  initInterframe(iframe);
  document.body.appendChild(iframe);
}
