using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using BIZ;

namespace GUI
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        ClassBIZ BIZ;
        UserControlCustomer UCC;
        UserControlDailyPrice UCDP;
        UserControlDiesel UCD;
        UserControlSupplier UCS;

        public MainWindow()
        {
            InitializeComponent();

            BIZ = new ClassBIZ();
            MainGrid.DataContext = BIZ;
            UCC = new UserControlCustomer(BIZ);
            UCDP = new UserControlDailyPrice(BIZ);
            UCD = new UserControlDiesel(BIZ);
            UCS = new UserControlSupplier(BIZ);

            // We add the usercontrols as children of each of the respective grid from the tabs
            CustomerGrid.Children.Add(UCC);
            DailyPriceGrid.Children.Add(UCDP);
            SalesGrid.Children.Add(UCD);
            SupplierGrid.Children.Add(UCS);

            BIZ.CallWebApi();
            //BIZ.PriceControl();

        }

    }
}
