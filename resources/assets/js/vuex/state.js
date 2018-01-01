
export const state = {
  breadCrumbsItems: [
          {
            text: 'Home',
            to: '/',
            disabled: false
          }
        ],
  navBreadCrumbs:[],
  successLogin: false,
  filterCategories: false,
  filterPlaces: false,
  categoryId: null,
  categories:[],
  subcategoryId: null,
  subcategories: [],
  furtherCategories:[],


  //PRODUCTS
  products: [],
  userProduct: [],


  //USER PRODUCT PAGINATION
  user_current_page: 1,

  //PRODUCTS PAGINATION
  current_page: 1,
  last_page: null,
  from: null,
  last_page_url: null,
  next_page_url: null,
  per_page: null,
  prev_page_url: null,
  to: null,
  total: null,


	dialog: {
		register: false,
		login: false
	},
  provinces: [],
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
	items: [
        { icon: 'queue',
          'icon-alt': 'queue',
          text: 'Categories',
      	},
        { icon: 'place', text: 'Places' },
        { icon: 'chat_bubble', text: 'Send feedback' },
        { icon: 'help', text: 'Help' },
        { icon: 'phonelink', text: 'App downloads' },
        { icon: 'keyboard', text: 'Go to the old version' }
      ]

}