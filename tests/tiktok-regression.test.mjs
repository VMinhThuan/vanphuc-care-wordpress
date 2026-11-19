import {test} from 'node:test';
import assert from 'node:assert/strict';
import {execFileSync} from 'node:child_process';
const php=process.env.PHP_BINARY||'php';
let available=true;
try{execFileSync(php,['-v'],{stdio:'ignore'});}catch{available=false;}
const check=(name,fn)=>test(name,{skip:available?false:'PHP required (available in CI)'},fn);
const render=(content,admin=false)=>execFileSync(php,['-n','tests/render-tiktok.php'],{input:JSON.stringify({content,admin}),encoding:'utf8'});
const video=id=>`<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@methuylamy/video/${id}" data-video-id="${id}"><section>Video</section></blockquote>`;
const loader='<script async src="https://www.tiktok.com/embed.js"></script>';
const creator='<blockquote class="tiktok-embed" data-embed-type="creator" data-unique-id="methuylamy"><section><a href="https://www.tiktok.com/@methuylamy/video/7440311961700650247">Creator</a></section></blockquote>';
check('multiple videos preserve surrounding quotes/text and get independent fallback links',()=>{
 const quote='<blockquote class="expert">Expert quote</blockquote><p>Between</p>';
 const result=render(quote+video('7440311961700650247')+loader+'<p>Middle</p>'+video('7485964405767785735')+loader);
 assert.ok(result.startsWith(quote));
 assert.equal((result.match(/<iframe /g)||[]).length,2);
 assert.equal((result.match(/Xem video trên TikTok/g)||[]).length,2);
 assert.ok(result.includes('href="https://www.tiktok.com/@methuylamy/video/7440311961700650247"'));
 assert.ok(!result.includes('embed.js'));
 assert.ok(result.includes('<p>Middle</p>'));
 assert.equal(render(result),result);
});
check('mixed video and creator retain creator markup and exactly one final loader',()=>{
 const result=render(video('7440311961700650247')+loader+creator+loader);
 assert.ok(result.includes(creator));
 assert.equal((result.match(/<iframe /g)||[]).length,1);
 assert.equal((result.match(/embed\.js/g)||[]).length,1);
 assert.ok(result.endsWith(loader));
 assert.equal(render(result),result);
});
check('creator-only, unsupported embeds and editor content remain intact',()=>{
 assert.equal(render(creator),creator+loader);
 const unknown='<blockquote class="tiktok-embed"><section>Missing ID</section></blockquote>';
 assert.equal(render(unknown),unknown+loader);
 const original=video('7440311961700650247')+loader;
 assert.equal(render(original,true),original);
 assert.equal(render('<p>Ordinary content</p>'),'<p>Ordinary content</p>');
});
check('attribute spacing works; fallback cannot escape TikTok domain or follow mismatched IDs',()=>{
 const spaced="<blockquote class = 'extra tiktok-embed' cite = 'https://www.tiktok.com/@methuylamy/video/7440311961700650247'><section>Video</section></blockquote>";
 assert.ok(render(spaced).includes('/player/v1/7440311961700650247'));
 const mismatch=video('123').replace('/video/123','/video/456');
 assert.ok(render(mismatch).includes('href="https://www.tiktok.com/player/v1/123"'));
 assert.ok(!render(mismatch).includes('href="https://www.tiktok.com/@methuylamy/video/456"'));
 const invalid='<blockquote class="tiktok-embed" data-video-id="javascript:alert(1)"><section>Invalid</section></blockquote>';
 assert.ok(!render(invalid).includes('<iframe'));
});
