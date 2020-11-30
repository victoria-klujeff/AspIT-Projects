using Repository;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace IO
{
    public class ClassLuxYachtDieselDB : ClassDbCon
    {
        //private static string sqlConStr;

        public ClassLuxYachtDieselDB()
        {

        }

        /// <summary>
        /// This method gets data from the DB by calling a stored procedure.
        /// It calls the method MakeCallToStoredProcedure and sends command as a parametre.
        /// Command contains con(our connection string), the command type and the name of the stored procedure.
        /// As this method needs to get everthing from the table in the DB, we get several sets of data,
        /// hence we put the result of the call in a List.
        /// </summary>
        /// <returns>List<ClassCustomer>List<ClassCustomer></returns>
        public List<ClassCustomer> GetAllCustomersFromDB()
        {
            List<ClassCustomer> listCustomerRes = new List<ClassCustomer>();
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spCustomers_GetAll";
            DataTable dataTable = MakeCallToStoredProcedure(command);
            foreach (DataRow row in dataTable.Rows)
            {
                ClassCustomer customer = new ClassCustomer(); // Initialize a new empty instance of ClassPerson 
                ClassCountry country = new ClassCountry();

                country.Id = Convert.ToInt32(row["Id"]);
                country.country = row["country"].ToString();
                country.countryCode = row["countryCode"].ToString();
                country.currency = row["currency"].ToString();
                country.currencyCode = row["currencyCode"].ToString();


                // Insert the values from the current row into each ones respective instance of ClassPerson
                customer.Id = Convert.ToInt32(row["customerId"]);
                customer.name = row["name"].ToString();
                customer.address = row["address"].ToString();
                customer.city = row["city"].ToString();
                customer.postalCode = row["postalCode"].ToString();
                customer.country = country;
                customer.phone = row["phone"].ToString();
                customer.mailAdr = row["mailAdr"].ToString();

                listCustomerRes.Add(customer); // Instance of ClassPerson is inserted into listPersonRes which is of the datatype List<ClassPerson>
            }
            return listCustomerRes;
        }

        /// <summary>
        /// This method saves(inserts) new customers in the DB.
        /// </summary>
        /// <param name="inCustomer">ClassCustomer inCustomer</param>
        public void SaveCustomerInDB(ClassCustomer inCustomer)
        {
            SqlCommand command = new SqlCommand(); //

            command.Connection = con; // Tell which db to connect to, con is declared in ClassDbCon
            command.CommandType = CommandType.StoredProcedure; // Declare which type of command we want to run
            command.CommandText = "spCustomers_Insert"; // Name of our stored procedure

            // Our parameters for 
            command.Parameters.Add("@name", SqlDbType.NVarChar).Value = inCustomer.name;
            command.Parameters.Add("@address", SqlDbType.NVarChar).Value = inCustomer.address;
            command.Parameters.Add("@city", SqlDbType.NVarChar).Value = inCustomer.city;
            command.Parameters.Add("@postalCode", SqlDbType.NVarChar).Value = inCustomer.postalCode;
            command.Parameters.Add("@country", SqlDbType.Int).Value = inCustomer.country.Id;
            command.Parameters.Add("@phone", SqlDbType.NVarChar).Value = inCustomer.phone;
            command.Parameters.Add("@mail", SqlDbType.NVarChar).Value = inCustomer.mailAdr;

            MakeCallToStoredProcedure(command); // Call method with our command as paramter. Is returned as a datatable 

        }

        /// <summary>
        /// This method updates a current customer in the DB
        /// </summary>
        /// <param name="inCustomer">ClassCustomer inCustomer</param>
        public void UpdateCustomerInDB(ClassCustomer inCustomer)
        {
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spCustomers_Update";

            command.Parameters.Add("@customerId", SqlDbType.Int).Value = inCustomer.Id;
            command.Parameters.Add("@name", SqlDbType.NVarChar).Value = inCustomer.name;
            command.Parameters.Add("@address", SqlDbType.NVarChar).Value = inCustomer.address;
            command.Parameters.Add("@city", SqlDbType.NVarChar).Value = inCustomer.city;
            command.Parameters.Add("@postalCode", SqlDbType.NVarChar).Value = inCustomer.postalCode;
            command.Parameters.Add("@country", SqlDbType.Int).Value = inCustomer.country.Id;
            command.Parameters.Add("@phone", SqlDbType.NVarChar).Value = inCustomer.phone;
            command.Parameters.Add("@mail", SqlDbType.NVarChar).Value = inCustomer.mailAdr;

            MakeCallToStoredProcedure(command);
        }

        /// <summary>
        /// This method gets data from the DB by calling a stored procedure.
        /// It calls the method MakeCallToStoredProcedure and sends command as a parametre.
        /// Command contains con(our connection string), the command type and the name of the stored procedure.
        /// As this method needs to get everthing from the table in the DB, we get several sets of data,
        /// hence we put the result of the call in a List.
        /// </summary>
        /// <returns>List<ClassSupplier>List<ClassSupplier></returns>
        public List<ClassSupplier> GetAllSuppliersFromDB()
        {
            List<ClassSupplier> listsupplierRes = new List<ClassSupplier>();
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spSuppliers_GetAll";
            DataTable dataTable = MakeCallToStoredProcedure(command);
            foreach (DataRow row in dataTable.Rows)
            {
                ClassSupplier supplier = new ClassSupplier(); // Initialize a new empty instance of ClassPerson 
                ClassCountry country = new ClassCountry();

                country.Id = Convert.ToInt32(row["Id"]);
                country.country = row["country"].ToString();
                country.countryCode = row["countryCode"].ToString();
                country.currency = row["currency"].ToString();
                country.currencyCode = row["currencyCode"].ToString();

                // Insert the values from the current row into each ones respective instance of ClassPerson
                supplier.Id = Convert.ToInt32(row["supplierId"]);
                supplier.firmName = row["companyName"].ToString();
                supplier.contactName = row["contactName"].ToString();
                supplier.address = row["address"].ToString();
                supplier.city = row["city"].ToString();
                supplier.postalCode = row["postalCode"].ToString();
                supplier.country = country;
                supplier.phone = row["phone"].ToString();
                supplier.mailAdr = row["mailAdr"].ToString();

                listsupplierRes.Add(supplier); // Instance of ClassPerson is inserted into listPersonRes which is of the datatype List<ClassPerson>
            }
            return listsupplierRes;
        }

        /// <summary>
        /// This method saves(inserts) new suppliers in the DB
        /// </summary>
        /// <param name="inSupplier">ClassSupplier</param>
        public void SaveSupplierInDB(ClassSupplier inSupplier)
        {
            SqlCommand command = new SqlCommand(); //

            command.Connection = con; // Tell which db to connect to, con is declared in ClassDbCon
            command.CommandType = CommandType.StoredProcedure; // Declare which type of command we want to run
            command.CommandText = "spSuppliers_Insert"; // Name of our stored procedure

            // Our parameters for 
            command.Parameters.Add("@companyName", SqlDbType.NVarChar).Value = inSupplier.firmName;
            command.Parameters.Add("@contactName", SqlDbType.NVarChar).Value = inSupplier.contactName;
            command.Parameters.Add("@address", SqlDbType.NVarChar).Value = inSupplier.address;
            command.Parameters.Add("@city", SqlDbType.NVarChar).Value = inSupplier.city;
            command.Parameters.Add("@postalCode", SqlDbType.NVarChar).Value = inSupplier.postalCode;
            command.Parameters.Add("@country", SqlDbType.NVarChar).Value = inSupplier.country.Id;
            command.Parameters.Add("@phone", SqlDbType.NVarChar).Value = inSupplier.phone;
            command.Parameters.Add("@mail", SqlDbType.NVarChar).Value = inSupplier.mailAdr;

            MakeCallToStoredProcedure(command); // Call method with our command as paramter. Is returned as a datatable 
        }

        /// <summary>
        /// This method updates existing suppliers in the DB
        /// </summary>
        /// <param name="inSupplier">ClassSupplier</param>
        public void UpdateSupplierInDB(ClassSupplier inSupplier)
        {
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spSupplier_Update";

            command.Parameters.Add("@supplierId", SqlDbType.Int).Value = inSupplier.Id;
            command.Parameters.Add("@companyName", SqlDbType.NVarChar).Value = inSupplier.firmName;
            command.Parameters.Add("@contactName", SqlDbType.NVarChar).Value = inSupplier.contactName;
            command.Parameters.Add("@address", SqlDbType.NVarChar).Value = inSupplier.address;
            command.Parameters.Add("@city", SqlDbType.NVarChar).Value = inSupplier.city;
            command.Parameters.Add("@postalCode", SqlDbType.NVarChar).Value = inSupplier.postalCode;
            command.Parameters.Add("@country", SqlDbType.Int).Value = inSupplier.country.Id;
            command.Parameters.Add("@phone", SqlDbType.NVarChar).Value = inSupplier.phone;
            command.Parameters.Add("@mail", SqlDbType.NVarChar).Value = inSupplier.mailAdr;

            MakeCallToStoredProcedure(command);
        }

        /// <summary>
        /// This method saves(inserts) new orders in the DB
        /// </summary>
        /// <param name="inOrder"></param>
        public void SaveOrderToDB(ClassOrder inOrder)
        {
            SqlCommand command = new SqlCommand(); //

            command.Connection = con; // Tell which db to connect to, con is declared in ClassDbCon
            command.CommandType = CommandType.StoredProcedure; // Declare which type of command we want to run
            command.CommandText = "spOrders_Insert"; // Name of our stored procedure

            // Our parameters for 
            command.Parameters.Add("@customerId", SqlDbType.Int).Value = inOrder.customer.Id;
            command.Parameters.Add("@supplierId", SqlDbType.Int).Value = inOrder.supplier.Id;
            command.Parameters.Add("@volume", SqlDbType.Int).Value = inOrder.volume;
            command.Parameters.Add("@date", SqlDbType.Date).Value = inOrder.date;
            command.Parameters.Add("@price", SqlDbType.Decimal).Value = inOrder.price;
            command.Parameters.Add("@customerRate", SqlDbType.Decimal).Value = inOrder.customerRate;
            command.Parameters.Add("@supplierRate", SqlDbType.Decimal).Value = inOrder.supplierRate;
            command.Parameters.Add("@profit", SqlDbType.Decimal).Value = inOrder.ownProfit;


            MakeCallToStoredProcedure(command); // Call method with our command as paramter. Is returned as a datatable 
        }

        /// <summary>
        /// This method gets a list of all countries from our DB
        /// </summary>
        /// <returns></returns>
        public List<ClassCountry> GetAllCountriesFromDB()
        {
            List<ClassCountry> listRes = new List<ClassCountry>();
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spCountryCurrency_GetAll";
            DataTable dataTable = MakeCallToStoredProcedure(command);
            foreach (DataRow row in dataTable.Rows)
            {
                ClassCountry country = new ClassCountry();

                country.Id = Convert.ToInt32(row["Id"]);
                country.country = row["country"].ToString();
                country.countryCode = row["countryCode"].ToString();
                country.currency = row["currency"].ToString();
                country.currencyCode = row["currencyCode"].ToString();


                

                listRes.Add(country); // Instance of ClassPerson is inserted into listPersonRes which is of the datatype List<ClassPerson>
            }
            return listRes;
        }

        /// <summary>
        /// This method gets the oilprice from the DB
        /// </summary>
        /// <returns>ClassDieselPrice</returns>
        public ClassDieselPrice GetOilPriceFromDB()
        {
            ClassDieselPrice priceRes = new ClassDieselPrice();
            SqlCommand command = new SqlCommand();

            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spDieselPrice_GetCurrent";
            command.Parameters.Add("@dateNow", SqlDbType.DateTime).Value = DateTime.Now;
            DataTable dtRes = MakeCallToStoredProcedure(command);

            foreach (DataRow row in dtRes.Rows)
            {
                priceRes.Id = Convert.ToInt32(row["Id"]);
                priceRes.date = Convert.ToDateTime(row["date"]);
                priceRes.price = Convert.ToDouble(row["price"]);

            }

            return priceRes;
        }

        /// <summary>
        /// This method gets data from the DB by calling a stored procedure.
        /// It calls the method MakeCallToStoredProcedure and sends command as a parametre.
        /// Command contains con(our connection string), the command type and the name of the stored procedure.
        /// As this method needs to get everthing from the table in the DB, we get several sets of data,
        /// hence we put the result of the call in a List.
        /// </summary>
        /// <returns>List<ClassDieselPrice></returns>
        public List<ClassDieselPrice> GetAllOilPriceFromDB()
        {
            List<ClassDieselPrice> listDieselPriceRes = new List<ClassDieselPrice>();
            SqlCommand command = new SqlCommand();
            command.Connection = con;
            command.CommandType = CommandType.StoredProcedure;
            command.CommandText = "spDieselPrice_GetAll";
            DataTable dataTable = MakeCallToStoredProcedure(command);
            foreach (DataRow row in dataTable.Rows)
            {
                ClassDieselPrice dieselPrice = new ClassDieselPrice(); // Initialize a new empty instance of ClassPerson 

                // Insert the values from the current row into each ones respective instance of ClassPerson
                dieselPrice.Id = Convert.ToInt32(row["Id"]);
                dieselPrice.date = Convert.ToDateTime(row["date"].ToString());
                dieselPrice.price = Convert.ToDouble(row["price"].ToString());

                listDieselPriceRes.Add(dieselPrice); // Instance of ClassPerson is inserted into listPersonRes which is of the datatype List<ClassPerson>
            }
            return listDieselPriceRes;
        }

        /// <summary>
        /// This method inserts our dieselprice to the DB
        /// </summary>
        /// <param name="inDiesel"></param>
        public void SaveOilPriceToDB(ClassDieselPrice inDiesel)
        {
            SqlCommand command = new SqlCommand(); //

            command.Connection = con; // Tell which db to connect to, con is declared in ClassDbCon
            command.CommandType = CommandType.StoredProcedure; // Declare which type of command we want to run
            command.CommandText = "spDieselPrice_Insert"; // Name of our stored procedure

            // Our parameters for 
            command.Parameters.Add("@price", SqlDbType.Decimal).Value = inDiesel.price;
            command.Parameters.Add("@date", SqlDbType.DateTime).Value = inDiesel.date;


            MakeCallToStoredProcedure(command); // Call method with our command as paramter. Is returned as a datatable 
        }


    }
}
