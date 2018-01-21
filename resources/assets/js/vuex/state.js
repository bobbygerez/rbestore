
export const state = {
  drawer: false,
  breadCrumbsItems: [],
  navBreadCrumbs:[],
  successLogin: false,
  filterCategories: false,
  filterPlaces: false,
  cart:null,
  totalItems: null,


  //CATEGORIES
  categoryId: null,
  categories:[],
  subcategoryId: null,
  subcategories: [],
  furtherCategories:[],
  furtherCatId:null,


  //PRODUCTS
  products: [],
  userProduct: [],
  dialogColors: false,
  selectedColorId: null,
  selectedSizeId: null,
  cartQuantity: 1,


  //USER PRODUCT PAGINATION
  user_current_page: 1,


	dialog: {
		register: false,
		login: false
	},
  provinces: [],
  provinceId: null,
  cities:[],
  cityId:null,
  brgys: [],
  brgyId: null,
  
	users: {

		firstname: '',
		lastname: '',
		company: '',
		jobTitle: '',
		email: '',
		mobile: '',
		password: ''
	},
  userProfile:[],
  productDetails: [],
	items: [
        { icon: 'queue',
          'icon-alt': 'queue',
          text: 'Categories',
      	},
        { icon: 'place', text: 'Places' },
        { icon: 'chat_bubble', text: 'Send feedback' },
        { icon: 'help', text: 'Help' }
      ]

}