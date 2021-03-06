package main

import (
	"fmt"
	"time"

	"golang.org/x/text/language"
	"golang.org/x/text/message"
)

func main() {
	t := time.Now()

	fmt.Println("time.Now():", t)
	fmt.Println("time.Now().UTC():", t.UTC())
	fmt.Println("time.Now().UTC().Unix():", t.UTC().Unix())
	fmt.Println("time.Now().Local().Unix():", t.Local().Unix())
	fmt.Println("time.Now().UTC().UnixNano():", t.UTC().UnixNano())
	fmt.Println("time.Now().Format(\"15-04-05\"):", t.Format("15-04-05"))
	fmt.Println("time.Day():", t.Day())
	fmt.Println("time.Hour():", t.Hour())
	fmt.Println("time.IsZero():", t.IsZero())
	fmt.Println("time.Local():", t.Local())
	fmt.Println("time.Location():", *(t.Location()))
	loc, _ := time.LoadLocation("Asia/Taipei")
	// loc, _ := time.LoadLocation("America/Los_Angeles")
	fmt.Println("time.In(time.LoadLocation(\"America/Los_Angeles\")):", t.In(loc))
	fmt.Println("time.Minute():", t.Minute())
	fmt.Println("time.Month():", t.Month())
	fmt.Println("time.Nanosecond():", t.Nanosecond())
	fmt.Println("time.Second():", t.Second())
	fmt.Println("time.String():", t.String())
	fmt.Println("time.Weekday():", t.Weekday())
	fmt.Println("time.Year():", t.Year())
	fmt.Println("time.YearDay():", t.YearDay())

	printer := message.NewPrinter(language.English)

	fmt.Println("\nUNITS:")
	printer.Println("time.Microsecond:", int64(time.Microsecond))
	printer.Println("time.Nanosecond:", int64(time.Nanosecond))
	printer.Println("time.Millisecond:", int64(time.Millisecond))
	printer.Println("time.Second:", int64(time.Second))
	printer.Println("time.Minute:", int64(time.Minute))

	t2 := t.Add(time.Minute * 2)
	printer.Println("time.Add(time.Minute):", t2)
	printer.Println("(t2 > t):", (t2.After(t)))
	printer.Println("(t2 == t):", (t2 == t))
	printer.Println("(t2 < t):", (t2.Before(t)))

	fmt.Println("time.Unix(1578633001, 0).Local():", time.Unix(1578633001, 0).Local())

}
