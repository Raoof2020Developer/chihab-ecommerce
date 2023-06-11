import './bootstrap'

import EditorJS from '@editorjs/editorjs';
import  List  from '@editorjs/list';
import Image from '@editorjs/image'
import Header from '@editorjs/header';
import CheckList from '@editorjs/checklist'
import Embed from '@editorjs/embed'
import Quote from '@editorjs/quote'
import Link from '@editorjs/link'
import Raw from '@editorjs/raw'
import axios from 'axios';



let saveBtn = document.getElementById('save-description')

if (saveBtn) {
    let imageUploadUrl = saveBtn.dataset.image_upload
    console.log(imageUploadUrl);
    let meta = document.head.querySelector("meta[name=\"csrf-token\"]")
    
    const editor = new EditorJS({
        /**
         * Id of Element that should contain Editor instance
         */
        holder: 'editor',
        tools: {
            header: {
                class: Header,
                inlineToolbar: ['link']
            },
            list: {
                class: List,
                inlineToolbar: true
            },
            image: {
                class: Image,
                config: {
                    endpoints: {
                        byFile: `${imageUploadUrl}`,
                        byUrl: `${imageUploadUrl}`,
                    },
                    additionalRequestHeaders: {
                        'X-CSRF-TOKEN': meta.getAttribute('content')
                    }
                }
            },
            checklist: {
                class: CheckList,
                inlineToolbar: true
            },
            linkTool: {
                class: Link,
                config: {
                endpoint: 'http://localhost:8000/fetchUrl', // Your backend endpoint for url data fetching,
            }},
            embed: Embed,
            quote: Quote
        }
      });

    saveBtn.addEventListener('click', e => {
        e.preventDefault()
        let aTag = e.target
        const url = aTag.getAttribute('href')
        console.log(aTag, url);
        editor.save().then(outputData => {
            console.log('Article data: ', outputData);

            document.getElementById('description').value = JSON.stringify(outputData)
            axios({
                method: 'post',
                url: url,
                data: {
                    description: outputData
                }
            }).then(data => {
                let msg = data.data.msg
                // document.getElementById('description').value = data.data
            })

        }).catch(err => {
            console.log('Saving failed: ', err);
        })
         
    }, false)
  }
