//
const minusBtn = document.querySelector('.minus')
const plusBtn = document.querySelector('.plus')
const counterNum = document.querySelector('.quantity_ordered.number')
const quantity = document.querySelector('.quantity')
let counterValue = Number(counterNum.textContent)

//
const productImages = document.querySelectorAll('.product-img')
const activeImage = document.querySelector('.active-img')

productImages.forEach(productImage => {
    productImage.addEventListener('click', () => {

        productImages.forEach(productImg => {
            productImg.classList.remove('active')
        })

        productImage.classList.add('active')
        activeImage.setAttribute('src', productImage.getAttribute('src'))
    })
})

//
const wilayasSelector = document.getElementById('wilaya')

async function getWilayas() {
    const wialaysList = await fetch('{{asset("storage/wilayas.json")}}')
        .then(response => {
            if (!response.ok) {
                throw new Error('Cannot read \'wialays.json\' file.')
            }   
            return response.json()
        }).then(data => {
            for (let i=0; i < data.length; ++i) {
                let wilayaOption = document.createElement('option')
                wilayaOption.setAttribute('value', data[i].id)
                wilayaOption.textContent = data[i].ar_name
                wilayasSelector.appendChild(wilayaOption)
            }
        });
}
getWilayas()


const baladiyasSelector = document.getElementById('baladiya')
wilayasSelector.addEventListener('change', () => {

    const selectedWilayaId = wilayasSelector.value

    async function getBaladiyas() {
    const baladiyasList = await fetch('{{asset("storage/baladiyas.json")}}')
            .then(res => {
                if (!res.ok) {
                    throw new Error('Cannot read \'balaiyas.json\' file.')
                }
                return res.json()
            }).then(data => {
                
                const targetedBaladiyas = data.filter(el => el.wilaya_id == Number(selectedWilayaId))
                baladiyasSelector.textContent = ''
                const defaultOption = document.createElement('option')
                defaultOption.setAttribute('value', 'default')
                defaultOption.setAttribute('disabled', true)
                defaultOption.setAttribute('selected', true)
                defaultOption.textContent = 'Baladiya | البلدية 📌'
                baladiyasSelector.appendChild(defaultOption)

                for (let j=0; j < targetedBaladiyas.length ; ++j) {
                    const baladiyaOption = document.createElement('option')
                    baladiyaOption.setAttribute('value', targetedBaladiyas[j].id)
                    baladiyaOption.textContent = targetedBaladiyas[j].ar_name
                    baladiyasSelector.appendChild(baladiyaOption)
                }
            })
}

    getBaladiyas()
})