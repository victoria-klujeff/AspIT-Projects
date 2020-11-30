using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using BIZ;
using System.Runtime.Remoting;

namespace UnitTestLuxYacht
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void TestMethod1()
        {
            // A - arrange - Opsætte betingelserne for testen. Sikrer adgang til klassen og opsætter forventninger
            ClassBIZ BIZ = new ClassBIZ();
            BIZ.dieselPrice.price = 1.03;
            BIZ.order.volume = 17500;
            BIZ.selectedCustomer.country.currencyCode = "BRL";
            BIZ.selectedSupplier.country.currencyCode = "MXN";

            double customerRes = 97331.0501;
            //double supplierRes = 371552.029;
            //double profitRes = 168.77815;

            // A - act - Udfører handling = kalder metoden der skal testes
            BIZ.CalculateAllValuesForOrder();


            // A - Assert - Undersøger om metoden giver det forventede resultat
            Assert.AreEqual(customerRes, BIZ.order.customerRate);
        }
        [TestMethod]
        public void TestMethod2()
        {
            // A - arrange - Opsætte betingelserne for testen. Sikrer adgang til klassen og opsætter forventninger

            // A - act - Udfører handling = kalder metoden der skal testes

            // A - Assert - Undersøger om metoden giver det forventede resultat

        }
        [TestMethod]
        public void TestMethod3()
        {
            // A - arrange - Opsætte betingelserne for testen. Sikrer adgang til klassen og opsætter forventninger

            // A - act - Udfører handling = kalder metoden der skal testes

            // A - Assert - Undersøger om metoden giver det forventede resultat

        }
    }
}
