using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using IO;
using Repository;

namespace BIZ
{
    public class ClassBIZ : ClassNotify
    {
        private string _buttonControl;
        private string _tabPrice;
        private string _tabItems;
        private string _comboLock;
        private string _textLock;
        private ClassCallWebAPI _classCallWebAPI;
        private ClassLuxYachtDieselDB _classLuxYachtDieselDB;
        private ClassCurrency _currency;
        private ClassCustomer _selectedCustomer;
        private ClassSupplier _selectedSupplier;
        private ClassCustomer _fallbackCustomer;
        private ClassSupplier _fallbackSupplier;
        private List<ClassDieselPrice> _listDieselPrice;
        private List<ClassCustomer> _listCustomers;
        private List<ClassSupplier> _listSupplier;
        private List<ClassCountry> _listCountry;
        private ClassDieselPrice _dieselPrice;
        private ClassOrder _order;

        public ClassBIZ()
        {
            buttonControl = "visible";
            tabItems = "false";
            tabPrice = "true";
            textLock = "true";
            comboLock = "false";

            classCallWebAPI = new ClassCallWebAPI();
            classLuxYachtDieselDB = new ClassLuxYachtDieselDB();
            currency = new ClassCurrency();
            selectedCustomer = new ClassCustomer();
            selectedSupplier = new ClassSupplier();
            fallbackCustomer = new ClassCustomer();
            fallbackSupplier = new ClassSupplier();
            order = new ClassOrder();

            listCountry = GetAllCountries();
            listDieselPrice = GetAllDieselPricesForListFromDB();
            listCustomers = GetAllCustomersForListFromDB();
            listSupplier = GetAllSuplliersForListFromDB();
            dieselPrice = GetDieselPriceFromDB();

            PriceControl();
        }


        public string buttonControl
        {
            get { return _buttonControl; }
            set
            {
                if (_buttonControl != value)
                {
                    _buttonControl = value;
                }
                Notify("buttonControl");
            }
        }

        public string tabPrice
        {
            get { return _tabPrice; }
            set
            {
                if (_tabPrice != value)
                {
                    _tabPrice = value;
                }
                Notify("tabPrice");
            }
        }

        public string tabItems
        {
            get { return _tabItems; }
            set
            {
                if (_tabItems != value)
                {
                    _tabItems = value;
                }
                Notify("tabItems");
            }
        }

        public List<ClassCountry> listCountry
        {
            get { return _listCountry; }
            set
            {
                if (_listCountry != value)
                {
                    _listCountry = value;
                }
                Notify("listCountry");
            }
        }

        public string comboLock
        {
            get { return _comboLock; }
            set
            {
                if (_comboLock != value)
                {
                    _comboLock = value;
                }
                Notify("comboLock");
            }
        }

        public string textLock
        {
            get { return _textLock; }
            set
            {
                if (_textLock != value)
                {
                    _textLock = value;
                }
                Notify("textLock");
            }
        }

        public ClassOrder order
        {
            get { return _order; }
            set
            {
                if (_order != value)
                {
                    _order = value;
                }
                Notify("order");
            }
        }

        public ClassDieselPrice dieselPrice
        {
            get { return _dieselPrice; }
            set
            {
                if (_dieselPrice != value)
                {
                    _dieselPrice = value;
                }
                Notify("dieselPrice");
            }
        }

        public List<ClassSupplier> listSupplier
        {
            get { return _listSupplier; }
            set
            {
                if (_listSupplier != value)
                {
                    _listSupplier = value;
                }
                Notify("listSupplier");
            }
        }

        public List<ClassCustomer> listCustomers
        {
            get { return _listCustomers; }
            set
            {
                if (_listCustomers != value)
                {
                    _listCustomers = value;
                }
                Notify("listCustomers");
            }
        }

        public List<ClassDieselPrice> listDieselPrice
        {
            get { return _listDieselPrice; }
            set
            {
                if (_listDieselPrice != value)
                {
                    _listDieselPrice = value;
                }
                Notify("listDieselPrice");
            }
        }

        public ClassSupplier fallbackSupplier
        {
            get { return _fallbackSupplier; }
            set
            {
                if (_fallbackSupplier != value)
                {
                    _fallbackSupplier = value;
                }
            }
        }

        public ClassCustomer fallbackCustomer
        {
            get { return _fallbackCustomer; }
            set
            {
                if (_fallbackCustomer != value)
                {
                    _fallbackCustomer = value;
                }
            }
        }

        public ClassSupplier selectedSupplier
        {
            get { return _selectedSupplier; }
            set
            {
                if (_selectedSupplier != value)
                {
                    _selectedSupplier = value;
                }
                Notify("selectedSupplier");
            }
        }

        public ClassCustomer selectedCustomer
        {
            get { return _selectedCustomer; }
            set
            {
                if (_selectedCustomer != value)
                {
                    _selectedCustomer = value;
                }
                Notify("selectedCustomer");
            }
        }

        public ClassCurrency currency
        {
            get { return _currency; }
            set
            {
                if (_currency != value)
                {
                    _currency = value;
                }
                Notify("currency");
            }
        }

        public ClassLuxYachtDieselDB classLuxYachtDieselDB
        {
            get { return _classLuxYachtDieselDB; }
            set
            {
                if (_classLuxYachtDieselDB != value)
                {
                    _classLuxYachtDieselDB = value;
                }
                Notify("classLuxYachtDieselBD");
            }
        }

        public ClassCallWebAPI classCallWebAPI
        {
            get { return _classCallWebAPI; }
            set
            {
                if (_classCallWebAPI != value)
                {
                    _classCallWebAPI = value;
                }
                Notify("classCallWebAPI");
            }
        }


        /// <summary>
        /// This method calls our webapi. 
        /// The method is async to avoid any delays if the data from the api is delayed.
        /// </summary>
        /// <returns>List</returns>
        public async Task<ClassCurrency> GetAllCurrenciesWebAPI()
        {
            ClassCurrency res = new ClassCurrency();
            
            try
            {

                res = await classCallWebAPI.GetURLContentsAsync();

            }
            catch (Exception ex)
            {

                throw ex;
            }
            return res;
        }

        public async void CallWebApi()
        {
            currency = await GetAllCurrenciesWebAPI();
        }

        /// <summary>
        /// This method calls the method that gets data from the DB.
        /// </summary>
        /// <returns>List</returns>
        public List<ClassCustomer> GetAllCustomersForListFromDB()
        {
            List<ClassCustomer> listRes = new List<ClassCustomer>();
            listRes = classLuxYachtDieselDB.GetAllCustomersFromDB();
            return listRes;

        }       

        /// <summary>
        /// This method calls the method that gets data from the DB.
        /// </summary>
        /// <returns>List</returns>
        public List<ClassSupplier> GetAllSuplliersForListFromDB()
        {
            List<ClassSupplier> listRes = new List<ClassSupplier>();
            listRes = classLuxYachtDieselDB.GetAllSuppliersFromDB();
            return listRes;
        }

        /// <summary>
        /// This method calls the method that gets data from the DB.
        /// </summary>
        /// <returns>List</returns>
        public List<ClassDieselPrice> GetAllDieselPricesForListFromDB()
        {
            List<ClassDieselPrice> listRes = new List<ClassDieselPrice>();
            listRes = classLuxYachtDieselDB.GetAllOilPriceFromDB();
            return listRes;

        }

        /// <summary>
        /// This method creates a list of all countries that we get from our DB call
        /// </summary>
        /// <returns></returns>
        public List<ClassCountry> GetAllCountries()
        {
            List<ClassCountry> listRes = new List<ClassCountry>();
            listRes = classLuxYachtDieselDB.GetAllCountriesFromDB();
            return listRes;
        }

        /// <summary>
        /// Calls the method which gets the dieselprice from the DB
        /// </summary>
        /// <returns></returns>
        public ClassDieselPrice GetDieselPriceFromDB()
        {
            ClassDieselPrice res = new ClassDieselPrice();
            res = classLuxYachtDieselDB.GetOilPriceFromDB();
            return res;

        }

        /// <summary>
        /// This method prompts the insert of a customer to the DB
        /// </summary>
        public void InsertCustomerInDB()
        {
            classLuxYachtDieselDB.SaveCustomerInDB(selectedCustomer);
            selectedCustomer = new ClassCustomer();
            GetAllCustomersForListFromDB();
        }

        /// <summary>
        /// This method prompts the update of a customer to the DB
        /// </summary>
        public void UpdateCustomerInDB()
        {
            classLuxYachtDieselDB.UpdateCustomerInDB(selectedCustomer);
            selectedCustomer = new ClassCustomer();
            GetAllCustomersForListFromDB();

        }

        /// <summary>
        /// This method prompts the insert of a customer to the DB
        /// </summary>
        public void InsertSupplierInDB()
        {
            classLuxYachtDieselDB.SaveSupplierInDB(selectedSupplier);
            selectedSupplier = new ClassSupplier();
            GetAllSuplliersForListFromDB();
        }

        /// <summary>
        /// This method prompts the update of a customer to the DB
        /// </summary>
        public void UpdateSupplierInDB()
        {
            classLuxYachtDieselDB.UpdateSupplierInDB(selectedSupplier);
            selectedSupplier = new ClassSupplier();
            GetAllSuplliersForListFromDB();
        }

        /// <summary>
        /// This method prompts the insertion of the diesel price to the DB
        /// </summary>
        public void InsertDieselPriceInDB()
        {
            classLuxYachtDieselDB.SaveOilPriceToDB(dieselPrice);
            dieselPrice = new ClassDieselPrice();
            listDieselPrice.Clear();
            GetAllDieselPricesForListFromDB();
        }

        /// <summary>
        /// This method prompts the insertion of the diesel price to the DB
        /// </summary>
        public void InsertOrderInDB()
        {
            classLuxYachtDieselDB.SaveOrderToDB(order);
        }

        /// <summary>
        /// This method handles a fallback customer in the case of the user regretting any changes in the data
        /// </summary>
        public void RegretUpdateOrNewCustomerForDB()
        {
            selectedCustomer = fallbackCustomer;
        }

        /// <summary>
        /// This method handles a fallback supplier in the case of the user regretting any changes in the data
        /// </summary>
        public void RegretUpdateOrNewSupplierForDB()
        {
            selectedSupplier = fallbackSupplier;
        }

        /// <summary>
        /// This method handles the user regretting creating a new price for the diesel
        /// </summary>
        public void RegretNewDieselPriceForDB()
        {
            dieselPrice = new ClassDieselPrice();
        }

        /// <summary>
        /// This method handles the user regretting creating a new order
        /// </summary>
        public void RegretNewOrderForDB()
        {
            order = new ClassOrder();
        }

        /// <summary>
        /// This method controls if the textboxes on the GUI editable or not.
        /// It is controlled through a property wich is of boolean datatype
        /// </summary>
        public void textControlLocked()
        {
            textLock = "true";
        }

        /// <summary>
        /// This method controls if the textboxes on the GUI editable or not.
        /// It is controlled through a property wich is of boolean datatype
        /// </summary>
        public void textControlUnlocked()
        {
            textLock = "false";
        }

        /// <summary>
        /// This method controls if the comboBox is available to open or not
        /// </summary>
        public void ComboBoxControlLocked()
        {
            comboLock = "false";
        }

        /// <summary>
        /// This method controls if the comboBox is available to open or not
        /// </summary>
        public void ComboBoxControlUnlocked()
        {
            comboLock = "true";
        }

        /// <summary>
        /// This method handles the calculation values of the customers price, the share of the price for the supplier
        /// and the profit 
        /// </summary>
        public void CalculateAllValuesForOrder()
        {
            decimal rateCustomer = currency.rates[selectedCustomer.country.currencyCode];
            decimal rateSupplier = currency.rates[selectedSupplier.country.currencyCode];
            decimal rateProfit = currency.rates["DKK"];

            order.supplierRate = (order.volume * dieselPrice.price) * Convert.ToDouble(rateCustomer);
            order.customerRate = (order.volume * dieselPrice.price * 1.00148) * Convert.ToDouble(rateSupplier);
            
            order.ownProfit = ((order.volume * dieselPrice.price * 1.00148) - (order.volume * dieselPrice.price)) * Convert.ToDouble(rateProfit);
        }

        public void PriceControl()
        {
            if (dieselPrice.price == 0)
            {
                tabPrice = "true";
                tabItems = "false";
                textLock = "false";
                buttonControl = "visible";
                GetDieselPriceFromDB();
                GetAllDieselPricesForListFromDB();
            }
            else
            {
                tabPrice = "false";
                tabItems = "true";
                textLock = "true";
                buttonControl = "hidden";
            }
            //GetAllDieselPricesForListFromDB();
        }
    }
}
